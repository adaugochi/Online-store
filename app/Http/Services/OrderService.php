<?php

namespace App\Http\Services;

use App\helpers\Statuses;
use App\Http\Repositories\BillingDetailRepository;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\PaymentRepository;
use App\Http\Repositories\ProductRepository;
use App\Models\Order;
use Stripe\Charge;
use Stripe\Exception\ApiErrorException;

class OrderService
{
    protected $orderRepository;
    protected $productOrderRepository;
    protected $paymentRepository;
    protected $billingDetailRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
        $this->productOrderRepository = new ProductRepository();
        $this->paymentRepository = new PaymentRepository();
        $this->billingDetailRepository = new BillingDetailRepository();
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

    public function createOrder($userId, $totalAmount)
    {
        return $this->orderRepository->insert([
            'user_id' => $userId,
            'total_amount' => (float)$totalAmount,
            'status' => Statuses::CONFIRMED,
            'order_number' => (string)time(),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function createProductOrder($orderId, $products)
    {
        $result = [];
        foreach ($products as $product) {
            $result[] = [
                'order_id' => $orderId,
                'product_id' => $product['product_id'],
                'unit_price' => $product['unit_price'],
                'quantity' => $product['quantity'],
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }

        return $this->productOrderRepository->insert($result);
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
            'zip_code' => $billing['zip_code'],
            'order_notes' => $billing['order_note']
        ]);
    }

}
