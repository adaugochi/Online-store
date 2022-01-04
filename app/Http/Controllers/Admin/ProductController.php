<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ModelNotCreatedException;
use App\Exceptions\ModelNotUpdatedException;
use App\helpers\Messages;
use App\Http\Repositories\ProductCategoryRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Services\ProductService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Cache;

class ProductController extends BaseAdminController
{
    const CATEGORY_REDIRECT_URI = 'admin.product-categories';
    const PRODUCT_REDIRECT_URI = 'admin.products';

    protected $productService;
    protected $productCategoryRepository;
    protected $productRepository;

    public function __construct()
    {
        $this->productService = new ProductService();
        $this->productCategoryRepository = new ProductCategoryRepository();
        $this->productRepository = new ProductRepository();
    }

    public function getProducts()
    {
        $products = Cache::rememberForever('products', function () {
            return $this->productRepository->findAll([], ['category']);
        });
        return view('admin.products.index', compact('products'));
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

    public function addProduct($id = null)
    {
        $product = [];
        if ($id) {
            $product = $this->productRepository->findById($id);
        }
        $categories = $this->productCategoryRepository->findAll(['is_active' => 1]);
        return view('admin.products.product', compact('categories', 'product'));
    }

    /**
     * @param ProductRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function saveProduct(ProductRequest $request)
    {
        try {
            $this->productService->saveProduct($request);
            return redirect(route(self::PRODUCT_REDIRECT_URI))->with([
                'success' => Messages::getSuccessMessage('Product')
            ]);
        } catch (ModelNotCreatedException $ex) {
            return redirect(route(self::PRODUCT_REDIRECT_URI))->with(['error' => $ex->getMessage()]);
        }
    }

    public function updateProductStatus(Request $request)
    {
        try {
            $this->productService->updateProductStatus($request->all());
            return redirect(route(self::PRODUCT_REDIRECT_URI))->with([
                'success' => Messages::getSuccessMessage('Product', 'updated')
            ]);
        } catch (ModelNotUpdatedException $ex) {
            return redirect(route(self::PRODUCT_REDIRECT_URI))->with(['error' => $ex->getMessage()]);
        }
    }
}
