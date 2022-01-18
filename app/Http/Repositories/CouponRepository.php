<?php

namespace App\Http\Repositories;

use App\Models\Coupon;

class CouponRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Coupon();
        parent::__construct($this->model);
    }
}
