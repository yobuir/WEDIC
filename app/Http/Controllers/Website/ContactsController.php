<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\NewsletterSubscriber;
use App\Models\User;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        return  view('website.contact.app', []);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'subject' => ['required'],
            'message' => ['required'],
        ]);



        try {
            $message = Contact::create(['name' => $validated['name'], 'phone' => $validated['phone'], 'email' => $validated['email'], 'subject' => $validated['subject'], 'message' => $validated['message']]);

            NewsletterSubscriber::UpdateOrCreate(['email' => $validated['email']], [
                'name' =>
                $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }

        return redirect()->back()->with('success', 'Message sent successfully');
    }
}
