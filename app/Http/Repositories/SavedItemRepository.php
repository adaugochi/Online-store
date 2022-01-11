<?php

namespace App\Http\Repositories;

use App\Models\SavedProduct;

class SavedItemRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new SavedProduct();
        parent::__construct($this->model);
    }
}
