<?php

namespace App\Http\View;

use App\Http\Repositories\ProductCategoryRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ProductCategoryComposer
{
    protected $productCategoryRepository;

    public function __construct()
    {
        $this->productCategoryRepository = new ProductCategoryRepository();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = Cache::rememberForever('categories', function () {
            return $this->productCategoryRepository->findAll(['is_active' => 1]);
        });
        $view->with('categories', $categories);
    }

}
