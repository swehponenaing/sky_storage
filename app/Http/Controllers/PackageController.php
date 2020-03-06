<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Package;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('role:User')->only('userpackage');
    }
    public function index()
    {
        $packages = Package::all();
        
        return view('frontend.packages.index', compact('packages'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // Validation 
        $request->validate([
            "name" => 'required',
            "storage_amount" => 'required',
            "price" => 'required',
            "recommend" => 'required',
        ]);


        // Store Data
        $package = new Package;
        $package->name = request('name');
        $package->storage_amount = request('storage_amount');
        $package->price = request('price');
        $package->recommend= request('recommend');
        // dd($package);
        $package->save();

        // 5
        // return redirect => indicate file path
        return redirect()->route('packages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('frontend.packages.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::findorFail($id);
        $packages = Package::all();
        return view('frontend.packages.edit',compact('package', 'packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation 
        $request->validate([
            "name" => 'required',
            "storage_amount" => 'required',
            "price" => 'required',
            "recommend" => 'required'
        ]);

        // Store Data
        $package = Package::findorFail($id);
        $package->name = request('name');
        $package->storage_amount = request('storage_amount');
        $package->price = request('price');
        $package->recommend = request('recommend');
        $package->save();

        // return redirect => indicate file path
        return redirect()->route('packages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();

        return redirect()->route('packages.index');
    }
    public function userpackage()
    {
        $packages = Package::all();
        
        return view('frontend.packages.index_user', compact('packages'));
    }

}
