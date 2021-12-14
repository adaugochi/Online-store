<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductObserver
{
    public function creating(Product $product)
    {
        $product->size = serialize($product->size);
        $product->created_by = auth()->user()->id;
        $this->clearCache();
    }

    public function updating(Product $product)
    {
        $product->size = serialize($product->size);
        $product->created_by = auth()->user()->id;
        $this->clearCache();
    }

    protected function clearCache(): bool
    {
        return Cache::forget('products');
    }
}
