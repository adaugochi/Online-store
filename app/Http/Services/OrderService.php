<?php

namespace App\Http\Services;

use App\helpers\Statuses;
use App\Http\Repositories\BillingDetailRepository;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\PaymentRepository;
use App\Http\Repositories\ProductOrderRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\UserRepository;
use App\Models\Order;
use App\Models\ProductOrder;
use Stripe\Charge;
use Stripe\Exception\ApiErrorException;

class OrderService
{
    protected $orderRepository;
    protected $productOrderRepository;
    protected $paymentRepository;
    protected $billingDetailRepository;
    protected $productRepository;
    protected $userRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
        $this->productOrderRepository = new ProductOrderRepository();
        $this->paymentRepository = new PaymentRepository();
        $this->billingDetailRepository = new BillingDetailRepository();
        $this->productRepository = new ProductRepository();
        $this->userRepository = new UserRepository();
    }

    public function getOrdersByUserId($userId)
    {
        return $this->orderRepository->findAll(['user_id' => $userId]);
    }

    public function getOrdersById($orderId)
    {
        return $this->productOrderRepository->findAll(['order_id' => $orderId], ['product']);
    }

    /**
     * @throws ApiErrorException
     */
    public function charge($totalAmount, $stripeToken): Charge
    {
        return Charge::create([
            "amount" => $totalAmount * 100,
            "currency" => "usd",
            "source" => $stripeToken, // obtained with Stripe.js
            "description" => "Charge for purchase"
        ]);
    }

    public function createOrder($userId, $totalAmount, $deliveryFee)
    {
        return $this->orderRepository->insert([
            'user_id' => $userId,
            'total_amount' => (float)$totalAmount,
            'delivery_fee' => $deliveryFee,
            'status' => Statuses::AWAITING_SHIPMENT,
            'order_number' => (string)time(),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function createProductOrder($orderId, $products)
    {
        $result = [];
        foreach ($products as $id => $product) {
            $price = $product['discount'] > 0 ? (($product['discount']/100) * $product['unit_price']) : $product['unit_price'];
            $result[] = [
                'order_id' => $orderId,
                'product_id' => $id,
                'unit_price' => $price,
                'quantity' => $product['quantity'],
                'size' => $product['size'],
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $product = $this->productRepository->findById($id);
            $product->quantity = $product->quantity - (int)$product['quantity'];
            $product->save();
        }

        return ProductOrder::insert($result);
    }

    public function createPayment($orderId, $txf, $totalAmount, $paymentMethod)
    {
        return $this->paymentRepository->insert([
            'order_id' => $orderId,
            'amount' => (float)$totalAmount,
            'transaction_reference' => $txf,
            'payment_method' => $paymentMethod,
            'status' => $txf ? Statuses::SUCCESS : Statuses::FAILED
        ]);
    }

    public function createBilling($orderId, $billing)
    {
        return $this->billingDetailRepository->insert([
            'order_id' => $orderId,
            'full_name' => $billing['first_name'] . ' ' . $billing['last_name'],
            'email' => $billing['email'],
            'phone_number' => $billing['international_number'],
            'street_address' => $billing['address'],
            'city' => $billing['city'],
            'state' => $billing['state'],
            'country' => $billing['country'],
            'zip_code' => $billing['postal_code'],
            'order_note' => $billing['message'] ?? '',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function getAllAdminUsers()
    {
        return $this->userRepository->findAll(['is_admin' => 1]);
    }

}
