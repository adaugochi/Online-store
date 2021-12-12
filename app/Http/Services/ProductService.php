<?php

namespace App\Http\Services;

use App\Exceptions\ModelNotCreatedException;
use App\Exceptions\ModelNotUpdatedException;
use App\helpers\Messages;
use App\helpers\Statuses;
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
     * @throws ModelNotUpdatedException
     */
    public function saveCategory($request)
    {
        if ($request['id']) {
            $productCategory = $this->productCategoryRepository->update(['name' => $request['name']], $request['id']);
            if (!$productCategory) {
                throw new ModelNotUpdatedException(Messages::NOT_UPDATED);
            }
        } else {
            $productCategory = $this->productCategoryRepository->insert($request);
            if (!$productCategory) {
                throw new ModelNotCreatedException(Messages::NOT_CREATED);
            }
        }

        return $productCategory;
    }

    /**
     * @throws ModelNotUpdatedException
     */
    public function updateCategoryStatus($request)
    {
        $isActive = array_search( $request['status'], Statuses::STATUS);
        $productCategory = $this->productCategoryRepository->update(
            ['is_active' => $isActive], $request['id']
        );
        if (!$productCategory) {
            throw new ModelNotUpdatedException(Messages::NOT_UPDATED);
        }
        return $productCategory;
    }
}
