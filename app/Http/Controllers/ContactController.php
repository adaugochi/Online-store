<?php

namespace App\Http\Controllers;

use App\Exceptions\ModelNotCreatedException;
use App\helpers\Messages;
use App\Http\Requests\ContactRequest;
use App\Http\Services\ContactService;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct()
    {
        $this->contactService = new ContactService();
    }

    public function index()
    {
        return view('sites.contacts.index');
    }

    public function save(ContactRequest $request)
    {
        try {
            $contact = $this->contactService->save($request->all());
            return redirect(route('contact'))->with([
                'success' => Messages::getSuccessMessage('Request'),
                'quantity' => $contact->quantity
            ]);
        } catch (ModelNotCreatedException $e) {
            return redirect(route('contact'))->with(['error' => $e->getMessage()]);
        }
    }
}
