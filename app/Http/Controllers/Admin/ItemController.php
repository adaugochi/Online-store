<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ItemController extends BaseAdminController
{
    public function getItems()
    {
        return view('admin.items.index');
    }

    public function getItemCategories()
    {
        return view('admin.items.category');
    }

    public function getOrders()
    {
        return view('admin.orders.index');
    }
}
