<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Folder;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function dashboard($value='')
    {
        return view('frontend.dashboard');
    }
}
