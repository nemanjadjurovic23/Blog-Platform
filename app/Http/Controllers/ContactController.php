<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function sendContacts(SendContactRequest $request)
    {
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
        $singleContact->update([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);

        return redirect()->route('contacts.all')->with('success', 'Contact updated successfully');
    }
}
