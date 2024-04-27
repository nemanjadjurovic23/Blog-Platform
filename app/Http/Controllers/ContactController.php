<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
           'email' => 'string|required',
           'subject' => 'string|required',
           'message' => 'string|required',
        ]);

         Contact::create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);

         return redirect('/');
    }

    public function allContacts()
    {
        $allContacts = Contact::all();

        return view('all-contacts', compact('allContacts'));
    }

    public function deleteContact($contact)
    {
        $singleContact = Contact::where(['id' => $contact])->first();

        if ($singleContact == null) {
            die('Contact not found');
        }

        $singleContact->delete();

        return redirect('/admin/all-contacts');
    }

    public function editContact($contact)
    {
        $singleContact = Contact::where(['id' => $contact])->first();

        if ($singleContact == null) {
            die('Contact not found');
        }

        return view('edit-contact', compact('singleContact'));
    }

    public function updateContact(Request $request, $contact)
    {
        $request->validate([
           'email' => 'string|required',
           'subject' => 'string|required',
           'message' => 'string|required',
        ]);

        $contactToUpdate = Contact::findOrFail($contact);
        $contactToUpdate->update([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);

        return redirect("/admin/all-contacts");
    }

}
