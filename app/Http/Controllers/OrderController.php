<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillingRequest;
use App\Http\Services\OrderService;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

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
}
