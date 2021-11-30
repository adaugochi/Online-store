<?php

namespace App\Http\Repositories;

use App\Models\Contact;

class ContactRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Contact();
        parent::__construct($this->model);
    }
}
