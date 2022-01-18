<?php

namespace App\Http\Services;

use App\Exceptions\ModelNotCreatedException;
use App\Exceptions\ModelNotUpdatedException;
use App\helpers\Messages;
use App\helpers\Statuses;
use App\Http\Repositories\ProductCategoryRepository;
use App\Http\Repositories\ProductRepository;
use App\Models\Product;

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

    /**
     * @throws ModelNotCreatedException
     */
    public function saveProduct($request): bool
    {
        $product = $this->productRepository->findById($request->get('id'));
        if ($product) {
            if ($request->hasFile('image')) {
                if(file_exists(public_path('/uploads/products/' . $product->image))) {
                    unlink(public_path('uploads/products/' . $product->image));
                };
                $product->image = $this->uploadImage($request);
            }
        } else {
            $product = new Product();
            if ($request->hasFile('image')) {
                $product->image = $this->uploadImage($request);
            }
        }

        $product->name = $request->get('name');
        $product->quantity = $request->get('quantity');
        $product->category_id = $request->get('category_id');
        $product->description = $request->get('description');
        $product->unit_price = $request->get('unit_price');
        $product->discount = $request->get('discount') ?? 0;
        $product->size = serialize($request->get('size'));
        if (!$product->save()) {
            throw new ModelNotCreatedException(Messages::NOT_CREATED);
        }
        return true;
    }

    /**
     * @throws ModelNotUpdatedException
     */
    public function updateProductStatus($request)
    {
        $isActive = array_search( $request['status'], Statuses::STATUS);
        $product = $this->productRepository->findById($request['id']);
        $product->is_active = $isActive;
        if (!$product->save()) {
            throw new ModelNotUpdatedException(Messages::NOT_UPDATED);
        }
        return $product;
    }

    public function uploadImage($request): string
    {
        $file = $request->file('image');
        $imageName = time() . $file->getClientOriginalName();
        $file->move('uploads/products', $imageName);
        return $imageName;
    }
}
