<?php

namespace App\Http\Controllers\Admin;

use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\ProductCategoryRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Http\Request;

class AdminController extends BaseAdminController
{
    protected $userRepository;
    protected $orderRepository;
    protected $productCategoryRepository;
    protected $productRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->orderRepository = new OrderRepository();
        $this->productCategoryRepository = new ProductCategoryRepository();
        $this->productRepository = new ProductRepository();
    }

    public function index()
    {
        $customers = count($this->userRepository->findAll(['is_admin' => 0]));
        $orders = count($this->orderRepository->findAll());
        $products = count($this->productRepository->findAll());

        return view('admin.dashboard', compact('customers', 'orders', 'products'));
    }

    public function getCustomers()
    {
        $customers = $this->userRepository->findAll(['is_admin' => 0]);
        return view('admin.customers.index', compact('customers'));
    }

    public function getCustomerOrders($id)
    {
        $orders = $this->orderRepository->findAll(['user_id' => $id]);
        return view('admin.customers.orders', compact('orders'));
    }
}
