<?php

namespace App\Http\Services;

use App\Exceptions\ModelNotCreatedException;
use App\helpers\Messages;
use App\Http\Repositories\ProductCategoryRepository;
use App\Http\Repositories\ProductRepository;

class ProductService extends BaseService
{
    protected $productCategoryRepository;
    protected $productRepository;

    public function __construct()
    {
        $this->productCategoryRepository = new ProductCategoryRepository();
        $this->productRepository = new ProductRepository();
    }

    /**
     * @throws ModelNotCreatedException
     */
    public function saveCategory($request)
    {
        $productCategory = $this->productCategoryRepository->insert($request);
        if (!$productCategory) {
            throw new ModelNotCreatedException(Messages::NOT_CREATED);
        }

        return $productCategory;
    }
}
