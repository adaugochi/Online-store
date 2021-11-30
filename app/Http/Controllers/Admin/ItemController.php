<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ItemController extends BaseAdminController
{
    public function getItems()
    {
        return view('admin.items');
    }

    public function getItemCategories()
    {
        return view('admin.item-category');
    }

    public function getOrders()
    {
        return view('admin.orders');
    }
}
