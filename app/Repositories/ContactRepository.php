<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository {

    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new Contact();
    }

    public function createContact($request)
    {
        Contact::create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);
    }

    public function updateContact($request, Contact $singleContact)
    {
        $singleContact->update([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);
    }
}
