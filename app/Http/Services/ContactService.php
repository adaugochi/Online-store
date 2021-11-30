<?php

namespace App\Http\Services;

use App\Exceptions\ModelNotCreatedException;
use App\helpers\Messages;
use App\Http\Repositories\ContactRepository;

class ContactService extends BaseService
{
    protected $contactRepository;

    public function __construct()
    {
        $this->contactRepository = new ContactRepository();
    }

    /**
     * @throws ModelNotCreatedException
     */
    public function save($request)
    {
        $contact = $this->contactRepository->insert($request);
        if (!$contact) {
            throw new ModelNotCreatedException(Messages::NOT_CREATED);
        }

        return $contact;
    }
}
