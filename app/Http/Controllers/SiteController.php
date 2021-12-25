<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;

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
}
