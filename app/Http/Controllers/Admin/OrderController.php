<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\OrderRepository;
use App\Http\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
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
}
