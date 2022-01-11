<?php

namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\SavedItemRepository;

class SavedItemService extends BaseService
{
    protected $saveItemRepository;
    public $productRepository;

    public function __construct()
    {
        $this->saveItemRepository = new SavedItemRepository();
        $this->productRepository = new ProductRepository();
    }

    public function all()
    {
        return $this->saveItemRepository->findAll(['user_id' => auth()->user()->id], ['product']);
    }

    public function save($request)
    {
        $productId = $request->get('product_id');
        $product = $this->productRepository->findById($productId);

        $this->saveItemRepository->insert([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'size' => $request->get('size'),
            'quantity' => $request->get('quantity'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function delete($request)
    {
        $this->saveItemRepository->deleteById($request->get('id'));
    }
}
