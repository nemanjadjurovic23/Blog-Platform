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

    public function sendContacts(Request $request)
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

        return redirect()->route('allContacts');
    }

    public function editContact(Contact $singleContact)
    {
        return view('admin/edit-contact', compact('singleContact'));
    }

    public function updateContact(Request $request, Contact $singleContact)
    {

        $singleContact->update([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);

        return redirect()->route('allContacts')->with('success', 'Contact updated successfully');
    }
}
