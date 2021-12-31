<?php

namespace App\Http\Repositories;

use App\Models\DeliveryFee;

class DeliveryFeeRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new DeliveryFee();
        parent::__construct($this->model);
    }
}
