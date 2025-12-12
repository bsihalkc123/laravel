<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    // Programs listing page
    public function index()
    {
        return view('frontend.program'); // list of all programs
    }

    // Individual program pages
    public function bca()
    {
        return view('frontend.programs.bca'); // BCA page
    }

    public function csit()
    {
        return view('frontend.programs.csit'); // CSIT page
    }

    public function bbs()
    {
        return view('frontend.programs.bbs'); // BBS page
    }

    public function bbm()
    {
        return view('frontend.programs.bbm'); // BBM page
    }
}
