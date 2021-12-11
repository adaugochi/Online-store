<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ModelNotCreatedException;
use App\Exceptions\ModelNotUpdatedException;
use App\helpers\Messages;
use App\Http\Repositories\ProductCategoryRepository;
use App\Http\Requests\CategoryRequest;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends BaseAdminController
{
    protected $productService;
    protected $productCategoryRepository;

    public function __construct()
    {
        $this->productService = new ProductService();
        $this->productCategoryRepository = new ProductCategoryRepository();
    }

    public function getProducts()
    {
        return view('admin.products.index');
    }

    public function getProductCategories()
    {
        $categories = $this->productCategoryRepository->findAll(['is_active' => 1]);
        return view('admin.products.category', compact('categories'));
    }

    public function saveProductCategory(CategoryRequest $request)
    {
        try {
            $this->productService->saveCategory($request->all());
            return redirect(route('admin.product-categories'))->with([
                'success' => Messages::getSuccessMessage('Product category')
            ]);
        } catch (ModelNotCreatedException|ModelNotUpdatedException $ex) {
            return redirect(route('admin.product-categories'))->with(['error' => $ex->getMessage()]);
        }
    }

    public function getOrders()
    {
        return view('admin.orders.index');
    }
}
