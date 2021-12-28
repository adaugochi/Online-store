<?php

namespace App\Http\Repositories;

use App\Models\ProductOrder;

class ProductOrderRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new ProductOrder();
        parent::__construct($this->model);
    }
}
