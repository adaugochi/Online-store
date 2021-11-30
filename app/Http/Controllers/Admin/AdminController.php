<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminController extends BaseAdminController
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function getCustomers()
    {
        return view('admin.customers.index');
    }
}
