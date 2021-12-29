<?php

namespace App\Http\Controllers;

use App\Http\Repositories\OrderRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $orderRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->orderRepository = new OrderRepository();
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $orders = count($this->orderRepository->findAll(['user_id' => auth()->user()->id]));
        return view('customers.dashboard', compact('orders'));
    }
}
