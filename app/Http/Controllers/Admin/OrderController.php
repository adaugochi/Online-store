<?php

namespace App\Http\Controllers\Admin;

use App\helpers\Messages;
use App\helpers\Statuses;
use App\Http\Repositories\OrderRepository;
use App\Http\Services\OrderService;
use App\Http\Traits\sendSMSTrait;
use Illuminate\Http\Request;

class OrderController extends BaseAdminController
{
    use sendSMSTrait;

    protected $orderRepository;
    protected $orderService;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
        $this->orderService = new OrderService();
    }

    public function index()
    {
        $orders = $this->orderRepository->findAll([], ['user']);
        return view('admin.orders.index', compact('orders'));
    }

    public function viewOrder($id)
    {
        $orders = $this->orderService->getOrdersById($id);
        return view('admin.orders.order', compact('orders'));
    }

    public function updateOrderStatus(Request $request)
    {
        try {
            $orderId = $request->get('id');
            $status = $request->get('status');

            $order = $this->orderRepository->findFirst(['id' => $orderId], ['user']);
            $recipientNumber = $order->user->international_number;
            $this->orderRepository->update(['status' => $status], $request->get('id'));
            $message = '';
            if ($status === Statuses::SHIPPED) {
                $message = 'Your Package with Order number ' . $order->order_number .
                    ' has been shipped. Please show your ID proof when it will get delivered to you.';
            }
            if ($status === Statuses::DELIVERED) {
                $message = 'Your Package with Order number ' . $order->order_number .
                    ' has been delivered to you. Thanks for shopping on ' . config('app.name') . '!';
            }

            $this->sendMessage($message, $recipientNumber);
            return redirect(route('admin.orders'))->with([
                'success' => Messages::getSuccessMessage('Order', 'updated')
            ]);
        } catch (\Exception $ex) {
            return redirect(route('admin.orders'))->with(['error' => $ex->getMessage()]);
        }
    }
}
