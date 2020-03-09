<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $login_user= Auth::user()->id;
        $user = User::find($login_user);
        

        return view('frontend.profiles.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Profile::create($request->all());

        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $created_by = Auth::user();
        $profile=Profile::find($id);
        return view('frontend.profiles.edit',compact('profile','created_by'));
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
        // validation 
        $request->validate([

            "name" => 'required'
        ]);

        
       // Store Data
        $user = User::find($id);

        $user->name =request('name');


        $user->save();


       // Return redirect //(5)
        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function name_edit(Request $request, $id)
    {
       // validation 
        $request->validate([

            "name" => 'required'  
        ]);

       
       // Store Data //(4)
        $user = User::find($id);

        $user->name =request('name');


        $user->save();


       // Return redirect //(5)
        return redirect()->route('profiles.index');
    }


    public function birthday_edit(Request $request, $id)
    {
        // validation 
        $request->validate([

            "birthday" => 'required'  
        ]);

      
       // Store Data //(4)
        $user = User::find($id);

        $user->birthday =request('birthday');


        $user->save();


       // Return redirect //(5)
        return redirect()->route('profiles.index');
    }

    public function gender_edit(Request $request, $id)
    {
       // validation 
        $request->validate([

            "gender" => 'required'  
        ]);

      
       // Store Data //(4)
        $user = User::find($id);

        $user->gender =request('gender');


        $user->save();


       // Return redirect //(5)
        return redirect()->route('profiles.index');
    }

    public function password_edit(Request $request, $id)
    {
        // validation 
        $request->validate([

            "password" => 'required'  
        ]);

      
       // Store Data //(4)
        $user = User::find($id);

        $user->password =request('password');


        $user->save();


       // Return redirect //(5)
        return redirect()->route('profiles.index');
    }

    public function email_edit(Request $request, $id)
    {
        // validation 
        $request->validate([

            "email" => 'required'  
        ]);

      
       // Store Data //(4)
        $user = User::find($id);

        $user->email =request('email');


        $user->save();


       // Return redirect //(5)
        return redirect()->route('profiles.index');
    }

    public function phone_edit(Request $request, $id)
    {
        // validation 
        $request->validate([

            "phone" => 'required'  
        ]);

      
       // Store Data //(4)
        $user = User::find($id);

        $user->phone =request('phone');


        $user->save();


       // Return redirect //(5)
        return redirect()->route('profiles.index');
    }
}
