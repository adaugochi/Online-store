<?php

namespace App\Http\Repositories;

use App\Models\Order;

class OrderRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Order();
        parent::__construct($this->model);
    }

    public function getOrdersByUserId($userId)
    {
        return $this->findAll(['user_id' => $userId]);
    }
}
