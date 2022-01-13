<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillingRequest;
use App\Http\Services\OrderService;
use App\Http\Traits\sendSMSTrait;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Stripe\Charge;
use Stripe\Stripe;

class OrderController extends Controller
{
    use sendSMSTrait;

    protected $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function index()
    {
        $orders = $this->orderService->getOrdersByUserId(auth()->user()->id);
        return view('customers.orders.index', compact('orders'));
    }

    public function getOrder($id)
    {
        $orders = $this->orderService->getOrdersById($id);
        return view('customers.orders.order', compact('orders'));
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws Exception
     */
    public function billing(BillingRequest $request)
    {
        $userId = auth()->user()->id;
        $billing = cache()->get('billing', []);
        $billing[$userId] = $request->all();
        cache()->put('billing', $billing);
        if ($request->get('payment_method') === Order::STRIPE) {
            return redirect(route('order.payment.stripe'));
        } else {
            return redirect(route('order.payment.paypal'));
        }
    }

    public function stripePayment()
    {
        return view('customers.orders.payments.stripe');
    }

    public function paypalPayment()
    {
        return view('customers.orders.payments.paypal');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws Exception
     */
    public function pay(Request $request)
    {
        DB::beginTransaction();
        $user = auth()->user();
        $userId = $user->id;

        if (!session()->has('cart')) {
            return redirect(route('cart'))->with(['info' => 'You have no item in your cart']);
        }

        try {
            $billing = cache()->get('billing');
            $billing = $billing[$userId];
            $totalAmount = $billing['total_amount'];
            $deliveryFee = $billing['delivery_fee'];

            $order = $this->orderService->createOrder($userId, $totalAmount, $deliveryFee);
            $orderId = $order->id;
            $cart = session()->get('cart');
            $this->orderService->createProductOrder($orderId, $cart);
            $this->orderService->createBilling($orderId, $billing);

            Stripe::setApiKey(config('app.stripe_key'));
            $charge = $this->orderService->charge($totalAmount, $request->get('stripeToken'));
            $this->orderService->createPayment($orderId, $charge->id, $totalAmount, $billing['payment_method']);

            $this->sendMessage(
                'Order number ' . $order->order_number . ' is now awaiting shipment. We will notify you
                once it has been shipped. Thanks for shopping on ' . config('app.name') . '!',
                $user->international_number
            );

            DB::commit();
            session()->forget('cart');
            unset($billing[$userId]);
            return redirect(route('customer.orders'))->with(['success' => 'Payment was successfully!.']);
        } catch (NotFoundExceptionInterface $e) {
            DB::rollBack();
            return redirect(route('cart.checkout'))->with('error', $e->getMessage());
        }
    }
}
