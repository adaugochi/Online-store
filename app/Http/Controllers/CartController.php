<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Http\Services\CartService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CartController extends Controller
{
    protected $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();
        return $this->middleware('auth', ['only' => ['addCheckout', 'checkout']]);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index()
    {
        $carts = session()->get('cart');
        return view('sites.cart', compact('carts'));
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function addToCart(CartRequest $request): JsonResponse
    {
        try {
            $total = $this->cartService->add($request);
            return response()->json(
                ['message' => 'Product added to cart.', 'total' => $total],
                200
            );
        } catch (ModelNotFoundException $ex) {
            return response()->json(
                ['status' => 'error', 'message' => 'Product not added to cart'],
                400
            );
        }
    }

    /**
     * @throws ContainerExceptionInterface
     */
    public function update(Request $request)
    {
        try {
            $this->cartService->update($request);
            return redirect(route('cart'));
        } catch (NotFoundExceptionInterface $ex) {
            return redirect(route('cart'));
        }
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function remove(Request $request)
    {
        try {
            $this->cartService->remove($request);
            return redirect(route('cart'));
        } catch (NotFoundExceptionInterface $ex) {
            return redirect(route('cart'));
        }
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function checkout()
    {
        $user = auth()->user();
        if (!session()->has('cart')) {
            return redirect(route('cart'))->with(['info' => 'You have no item in your cart']);
        }
        $carts = session()->get('cart');

        return view('customers.checkout', compact('user', 'carts'));
    }
}
