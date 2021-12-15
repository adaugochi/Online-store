<?php

namespace App\Http\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Product();
        parent::__construct($this->model);
    }

    public function getAllProducts()
    {
        return Product::query()->with('category')->get();
    }
}
