<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function dashboard($value='')
    {
        return view('frontend.dashboard');
    }
}
