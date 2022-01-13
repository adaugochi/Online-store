<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;
use App\Models\ProductCategory;

class SiteController extends Controller
{
    protected $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function index()
    {
        $products = $this->productRepository->getAllProducts();
        return view('sites.welcome', compact('products'));
    }

    public function faqs()
    {
        return view('sites.faqs');
    }

    public function getProductsByCategory($slug = null)
    {
        $category = ProductCategory::query()->where('key', $slug)->firstOrFail();
        $products = $this->productRepository->getAllProductsByCategoryId($category->id);
        return view('sites.category', compact('products', 'category'));
    }
}
