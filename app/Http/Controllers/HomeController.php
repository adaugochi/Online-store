<?php

namespace App\Http\Controllers;

use App\helpers\Messages;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\SavedItemRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    protected $orderRepository;
    protected $userRepository;
    protected $saveItemRepository;
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
        $this->saveItemRepository = new SavedItemRepository();
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $userId = auth()->user()->id;
        $orders = count($this->orderRepository->findAll(['user_id' => $userId]));
        $savedItems = count($this->saveItemRepository->findAll(['user_id' => $userId]));
        return view('customers.dashboard', compact('orders', 'savedItems'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('customers.profile', compact('user'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $result = $this->userRepository->update($request->all(), auth()->user()->id);
        if ($result) {
            return redirect(route('customer.profile'))->with([
                'success' =>  Messages::getSuccessMessage('profile', 'updated')
            ]);
        }
        return redirect(route('customer.profile'))->with([
            'error' =>  'profile not updated successfully'
        ]);
    }

    public function account()
    {
        return view('customers.change-password');
    }

    public function changePassword(PasswordRequest $request)
    {
        $result = $this->userRepository->update(
            ['password' => Hash::make($request->get('password'))], auth()->user()->id
        );
        if ($result) {
            return redirect(route('customer.account'))->with([
                'success' =>  Messages::getSuccessMessage('Password', 'changed')
            ]);
        }
        return redirect(route('customer.account'))->with([
            'error' =>  'Password change was not successful'
        ]);
    }
}
