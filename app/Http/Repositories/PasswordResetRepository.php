<?php

namespace App\Http\Repositories;

use App\Models\PasswordReset;

class PasswordResetRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new PasswordReset();
        parent::__construct($this->model);
    }
}
