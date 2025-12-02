<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminDashboardController extends Controller
{
    //Display the admin dashboard.
    
    public function index(){
    $messsages = \App\Models\Contactus::latest()->get();
    return view('backend.Admindashboard');


    }
}
