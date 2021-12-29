<?php

namespace App\Http\Controllers;

use App\helpers\Messages;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\ProfileRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $orderRepository;
    protected $userRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->orderRepository = new OrderRepository();
        $this->userRepository = new UserRepository();
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

    public function profile()
    {
        $user = auth()->user();
        return view('customers.profile', compact('user'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $this->userRepository->update($request->all(), auth()->user()->id);
        return redirect(route('customer.profile'))->with([
            'success' =>  Messages::getSuccessMessage('profile', 'updated')
        ]);
    }
}
