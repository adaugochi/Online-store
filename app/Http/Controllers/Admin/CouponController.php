<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CouponService;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    protected $couponService;

    public function __construct()
    {
        $this->couponService = new CouponService();
    }

    public function index()
    {
        return view('admin.coupons.index');
    }
}
