<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminContactNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ContactUsController extends Controller
{
    // Show contact form (backend)
    public function create()
    {
        return view('backend.contactus.create');
    }

    // Store form data
    public function store(Request $request)
    {
       
        $request->validate([
            'full_name'     => 'required|string|max:255',
            'email'         => 'required|email',
            'request_type'  => 'required|string',
            'message'       => 'required|string',
        ]);


        $contact = Contactus::create([
            'full_name'     => $request->full_name,
            'email'         => $request->email,
            'request_type'  => $request->request_type,
            'message'       => $request->message,
        ]);


        try {
            Mail::to('csit22081043_bishal@achsnepal.edu.np')->send(new AdminContactNotification($contact));
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            Log::error('Failed to send contact notification email: ' . $e->getMessage());
        }



        return redirect()->route('contactus.index')
            ->with('success', 'Message sent successfully!');
    }

    // Admin: show all messages
    public function index()
    {
        $messages = Contactus::latest()->paginate(10);
        return view('backend.contactus.index', compact('messages'));
    }

    // Show edit page
    public function edit($id)
    {
        $message = Contactus::findOrFail($id);
        return view('backend.contactus.edit', compact('message'));
    }

    // Update contact message
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name'     => 'required|string|max:255',
            'email'         => 'required|email',
            'request_type'  => 'required|string',
            'message'       => 'required|string',
        ]);

        $message = Contactus::findOrFail($id);

        $message->update([
            'full_name'     => $request->full_name,
            'email'         => $request->email,
            'request_type'  => $request->request_type,
            'message'       => $request->message,
        ]);

        return redirect()->route('contactus.index')
            ->with('success', 'Message updated successfully!');
    }

    // Admin: delete a message
    public function destroy($id)
    {
        Contactus::findOrFail($id)->delete();

        return redirect()->route('contactus.index')
            ->with('success', 'Message deleted successfully!');
    }
}
