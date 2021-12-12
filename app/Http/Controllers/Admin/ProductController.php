<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ModelNotCreatedException;
use App\Exceptions\ModelNotUpdatedException;
use App\helpers\Messages;
use App\Http\Repositories\ProductCategoryRepository;
use App\Http\Requests\CategoryRequest;
use App\Http\Services\ProductService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends BaseAdminController
{
    const CATEGORY_REDIRECT_URI = 'admin.product-categories';

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
        $categories = Cache::rememberForever('categories', function () {
            return $this->productCategoryRepository->findAll();
        });
        return view('admin.products.category', compact('categories'));
    }

    public function saveProductCategory(CategoryRequest $request)
    {
        try {
            $this->productService->saveCategory($request->all());
            return redirect(route(self::CATEGORY_REDIRECT_URI))->with([
                'success' => Messages::getSuccessMessage('Product category')
            ]);
        } catch (ModelNotCreatedException|ModelNotUpdatedException $ex) {
            return redirect(route(self::CATEGORY_REDIRECT_URI))->with(['error' => $ex->getMessage()]);
        } catch (QueryException $ex) {
            return redirect(route(self::CATEGORY_REDIRECT_URI))->with(['error' => 'Category already exist']);
        }
    }

    public function updateProductCategoryStatus(Request $request)
    {
        try {
            $this->productService->updateCategoryStatus($request->all());
            return redirect(route(self::CATEGORY_REDIRECT_URI))->with([
                'success' => Messages::getSuccessMessage('Product category', 'updated')
            ]);
        } catch (ModelNotUpdatedException $ex) {
            return redirect(route(self::CATEGORY_REDIRECT_URI))->with(['error' => $ex->getMessage()]);
        }
    }

    public function getOrders()
    {
        return view('admin.orders.index');
    }
}
