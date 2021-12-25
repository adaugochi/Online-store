<?php

namespace App\Http\Repositories;

class CartRepository
{
    public $products = null;
    public $totalQty = 0;
    public $totalAmt = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->products = $oldCart->products;
            $this->totalQty = $oldCart->totalQty;
            $this->totalAmt = $oldCart->totalAmt;
        }
    }

    /**
     * @param $product
     * @param $id
     */
    public function add($product, $id)
    {
        $storeProduct = ['quantity' => 0, 'amount' => $product->amount, 'title' => $product->title, 'product' => $product];

        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $storeProduct = $this->products[$id];
            }
        }
        $storeProduct['quantity']++;
        $storeProduct['amount'] = $product->amount * $storeProduct['quantity'];
        $this->products[$id] = $storeProduct;
        $this->totalQty++;
        $this->totalAmt += $product->amount;
    }

    public function removeOne($id)
    {
        $this->products[$id]['quantity']--;
        $this->products[$id]['amount'] -= $this->products[$id]['product']['amount'];
        $this->totalQty--;
        $this->totalAmt -= $this->products[$id]['product']['amount'];

        if ($this->products[$id]['quantity'] <= 0) {
            unset($this->products[$id]);
        }
    }

    public function removeAll($id)
    {
        $this->totalQty -= $this->products[$id]['quantity'];
        $this->totalAmt -= $this->products[$id]['amount'];
        unset($this->products[$id]);
    }

    public function increaseByOne($id)
    {
        $this->products[$id]['quantity']++;
        $this->products[$id]['amount'] += $this->products[$id]['product']['amount'];
        $this->totalQty++;
        $this->totalAmt += $this->products[$id]['product']['amount'];
    }
}
