<?php

namespace App\Http\Repositories;

use App\Models\BillingDetail;

class BillingDetailRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new BillingDetail();
        parent::__construct($this->model);
    }
}
