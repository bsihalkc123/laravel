<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use Illuminate\Http\Request;

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

        Contactus::create([
            'full_name'     => $request->full_name,
            'email'         => $request->email,
            'request_type'  => $request->request_type,
            'message'       => $request->message,
        ]);

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
        return view('contactus.edit', compact('message'));
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
