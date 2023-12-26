<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebProfileController extends Controller
{
    public function page()
    {
     
            return view('profile');
        
    }
}
