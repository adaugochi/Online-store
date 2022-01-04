<?php

namespace App\Http\Services;

use App\Http\Repositories\DeliveryFeeRepository;
use App\Http\Repositories\ProductRepository;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CartService
{
    public $productRepository;
    public $deliveryFeeRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
        $this->deliveryFeeRepository = new DeliveryFeeRepository();
    }

    /**
     * @param $request
     * @return int
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function add($request): int
    {
        $productId = $request->get('product_id');
        $product = $this->productRepository->findById($productId);

        $cart = session()->get('cart', []);

        $cart[$productId] = [
            "name" => $product->name,
            "quantity" => $request->get('quantity'),
            "unit_price" => $product->unit_price,
            "discount" => $product->discount,
            "image" => $product->image,
            "sizes" => $product->size,
            "size" => $request->get('size')
        ];

        session()->put('cart', $cart);
        return count($cart);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function remove($request): bool
    {
        $productId = $request->get('id');

        if($productId) {
            $cart = session()->get('cart');
            if(isset($cart[$productId])) {
                unset($cart[$productId]);
                session()->put('cart', $cart);
            }
            return true;
        }
        return false;
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update($request): bool
    {
        $productId = $request->get('id');
        $product = $this->productRepository->findById($productId);

        if($product) {
            $cart = session()->get('cart');
            $cart[$productId]["quantity"] = $request->get('quantity');
            $cart[$productId]["size"] = $request->get('size');
            session()->put('cart', $cart);
        }
        return true;
    }

    public function getDeliveryFees()
    {
        return $this->deliveryFeeRepository->findAll();
    }
}
