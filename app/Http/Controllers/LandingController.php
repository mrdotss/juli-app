<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    
    // Satpam :v
    // public function __construct()
    // {
    //     $this -> middleware('auth');
    // }

    public function show()
    {
        return view('welcome');
    }
}