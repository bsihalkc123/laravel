<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminContactNotification;
use Illuminate\Support\Facades\Log;

class ContactUsController extends Controller
{
    /**
     * Show frontend contact form (homepage)
     */
    public function create()
    {
        // Frontend homepage with contact form
        return view('frontend.frontdashboard');
    }

    /**
     * Store contact form submission
     */
    public function store(Request $request)
    {
        // Validate form input
        $request->validate([
            'full_name'    => 'required|string|max:255',
            'email'        => 'required|email',
            'request_type' => 'required|string',
            'message'      => 'required|string',
        ]);

        // Save message to database
        $contact = Contactus::create([
            'full_name'    => $request->full_name,
            'email'        => $request->email,
            'request_type' => $request->request_type,
            'message'      => $request->message,
        ]);

        // Send email notification to admin
        try {
            Mail::to('csit22081043_bishal@achsnepal.edu.np')
                ->send(new AdminContactNotification($contact));
        } catch (\Exception $e) {
            Log::error('Failed to send contact notification email: ' . $e->getMessage());
        }

        // Stay on frontend page with success message
        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    /**
     * Admin: show all messages
     */
    public function index()
    {
        // Paginate messages for admin dashboard
        $messages = Contactus::latest()->paginate(10);
        return view('backend.contactus.index', compact('messages'));
    }

    /**
     * Show edit form for a message (admin)
     */
    public function edit($id)
    {
        $message = Contactus::findOrFail($id);
        return view('backend.contactus.edit', compact('message'));
    }

    /**
     * Update a contact message (admin)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name'    => 'required|string|max:255',
            'email'        => 'required|email',
            'request_type' => 'required|string',
            'message'      => 'required|string',
        ]);

        $message = Contactus::findOrFail($id);
        $message->update([
            'full_name'    => $request->full_name,
            'email'        => $request->email,
            'request_type' => $request->request_type,
            'message'      => $request->message,
        ]);

        return redirect()->route('contactus.index')
            ->with('success', 'Message updated successfully!');
    }

    /**
     * Delete a contact message (admin)
     */
    public function destroy($id)
    {
        Contactus::findOrFail($id)->delete();

        return redirect()->route('contactus.index')
            ->with('success', 'Message deleted successfully!');
    }
}
