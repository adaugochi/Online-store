<?php

namespace App\Http\Repositories;

use App\Models\ProductCategory;

class ProductCategoryRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new ProductCategory();
        parent::__construct($this->model);
    }
}
