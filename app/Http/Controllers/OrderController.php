<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillingRequest;
use App\Http\Services\OrderService;
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
    protected $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
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
        $userId = auth()->user()->id;

        if (!session()->has('cart')) {
            return redirect(route('cart'))->with(['info' => 'You have no item in your cart']);
        }

        Stripe::setApiKey(env("STRIPE_SECRET_KEY"));
        $billing = cache()->get('billing');
        $billing = $billing[$userId];
        $totalAmount = $billing['total_amount'];
        try {
            $charge = $this->orderService->charge($totalAmount, $request->get('stripeToken'));
            $order = $this->orderService->createOrder($userId, $totalAmount);
            $orderId = $order->id;

            $cart = session()->get('cart');
            $productOrder = $this->orderService->createProductOrder($orderId, $cart[$userId]);
            $payment = $this->orderService->createPayment($orderId, $charge->id, $totalAmount, $billing['payment_method']);
            $this->orderService->createBilling($orderId, $billing);

            DB::commit();
            session()->forget('cart');
            return redirect(route('customer.home'))->with(['status' => 'Payment was successfully!.']);
        } catch (NotFoundExceptionInterface $e) {
            DB::rollBack();
            return redirect(route('cart.checkout'))->with('error', $e->getMessage());
        }
    }
}
