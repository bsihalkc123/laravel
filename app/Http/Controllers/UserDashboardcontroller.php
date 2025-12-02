<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactus;
use App\Models\Result;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreContactRequest;
class UserDashboardController extends Controller
{
    // Guest landing page with login button
    public function landingPage()
    {
        return view('frontend.user-dashboard-landing'); 
    }

    // Logged-in user dashboard
    public function index()
    {
        $user = Auth::user();
        // Get user's courses
        $courses = $user->courses ?? collect();  
        // Ensure User model has a courses() relationship

        // Get user's results
        $results = $user->results ?? collect();  
        // Ensure User model has a results() relationship

        // Pass variables to the view
        return view('frontend.frontdashboard', compact('courses', 'results'));
    }

    // Handle contact form submission from dashboard
    public function storeContact(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'message'   => 'required|string',
            'request_type'  => 'required|string',
        ]);

        Contactus::create($request->only('full_name', 'email', 'message', 'request_type'));

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
} 