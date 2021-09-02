<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
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
