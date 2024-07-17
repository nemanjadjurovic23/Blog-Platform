<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    private $contactRepository;

    public function __construct()
    {
        $this->contactRepository = new ContactRepository();
    }
    public function index()
    {
        return view('contact');
    }

    public function sendContacts(SendContactRequest $request)
    {
        $this->contactRepository->createContact($request);
        return redirect()->route('/');
    }

    public function allContacts()
    {
        $allContacts = Contact::all();
        return view('/admin/all-contacts', compact('allContacts'));
    }

    public function deleteContact(Contact $singleContact)
    {
        $singleContact->delete();
        return redirect()->route('contacts.all');
    }

    public function editContact(Contact $singleContact)
    {
        return view('admin/edit-contact', compact('singleContact'));
    }

    public function updateContact(Request $request, Contact $singleContact)
    {
        $this->contactRepository->updateContact($request, $singleContact);

        return redirect()->route('contacts.all')->with('success', 'Contact updated successfully');
    }
}
