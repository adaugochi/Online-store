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
        return $this->model->query()
            ->where('quantity', '>',  0)
            ->where(['is_active' => 1])
            ->with('category')->get();
    }
}
