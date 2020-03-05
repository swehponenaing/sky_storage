<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $folders= Folder::all();
        return view('frontend.folders.index', compact('folders'));
    }
}
