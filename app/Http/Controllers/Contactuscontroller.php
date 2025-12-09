<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminContactNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ContactUsController extends Controller
{
    /**
     * Show frontend contact form (homepage)
     */
    public function create()
    {
        return view('frontend.frontdashboard');
    }

    /**
     * Store contact form submission
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name'    => 'required|string|max:255',
            'email'        => 'required|email',
            'request_type' => 'required|string',
            'message'      => 'required|string',
            'attachment'   => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        // Handle file upload
        $filepath = null;
        if ($request->hasFile('attachment')) {
            $filepath = $request->file('attachment')->store('contact_attachments', 'public');
        }

        // Save message
        $contact = Contactus::create([
            'full_name'    => $request->full_name,
            'email'        => $request->email,
            'request_type' => $request->request_type,
            'message'      => $request->message,
            'attachment'   => $filepath,
        ]);

        // Send email notification
        try {
            Mail::to('csit22081043_bishal@achsnepal.edu.np')
                ->send(new AdminContactNotification($contact));
        } catch (\Exception $e) {
            Log::error('Email send failed: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    /**
     * Admin: show all messages
     */
    public function index()
    {
        $messages = Contactus::latest()->paginate(10);
        return view('backend.contactus.index', compact('messages'));
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $message = Contactus::findOrFail($id);
        return view('backend.contactus.edit', compact('message'));
    }

    /**
     * Update message (admin)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name'    => 'required|string|max:255',
            'email'        => 'required|email',
            'request_type' => 'required|string',
            'message'      => 'required|string',
            'attachment'   => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $message = Contactus::findOrFail($id);

        // Handle attachment update
        if ($request->hasFile('attachment')) {

            // Delete old file
            if ($message->attachment && Storage::disk('public')->exists($message->attachment)) {
                Storage::disk('public')->delete($message->attachment);
            }

            // Store new file
            $filepath = $request->file('attachment')->store('contact_attachments', 'public');
        } else {
            $filepath = $message->attachment; // keep existing file
        }

        // Update fields
        $message->update([
            'full_name'    => $request->full_name,
            'email'       => $request->email,
            'request_type' => $request->request_type,
            'message'      => $request->message,
            'attachment'   => $filepath,
        ]);

        return redirect()->route('contactus.index')
            ->with('success', 'Message updated successfully!');
    }

    /**
     * Delete message (admin)
     */
    public function destroy($id)
    {
        $message = Contactus::findOrFail($id);

        // Delete file if exists
        if ($message->attachment && Storage::disk('public')->exists($message->attachment)) {
            Storage::disk('public')->delete($message->attachment);
        }

        $message->delete();

        return redirect()->route('contactus.index')
            ->with('success', 'Message deleted successfully!');
    }
}
