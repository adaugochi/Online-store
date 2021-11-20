<?php

namespace App\Http\Repositories;

use App\Models\UserVerification;

class UserVerificationRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new UserVerification();
        parent::__construct($this->model);
    }
}
