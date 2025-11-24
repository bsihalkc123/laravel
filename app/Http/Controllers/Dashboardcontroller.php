<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    //Display the admin dashboard.
    
    public function index(){
    return view('backend.dashboard');


    }
}
