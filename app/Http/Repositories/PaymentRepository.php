<?php

namespace App\Http\Repositories;


use App\Models\Payment;

class PaymentRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Payment();
        parent::__construct($this->model);
    }
}
