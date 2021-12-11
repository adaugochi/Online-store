<?php

namespace App\Observers;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ProductCategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param ProductCategory $category
     * @return void
     */
    public function creating(ProductCategory $category)
    {
        $categoryName = $category->name;
        $category->key = Str::of($categoryName)->slug();
        $category->name = Str::title($categoryName);
        $this->clearCache();
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param ProductCategory $category
     * @return void
     */
    public function updating(ProductCategory $category)
    {
        $categoryName = $category->name;
        $category->key = Str::of($categoryName)->slug();
        $category->name = Str::title($categoryName);
        $this->clearCache();
    }

    protected function clearCache(): bool
    {
        return Cache::forget('categories');
    }
}
