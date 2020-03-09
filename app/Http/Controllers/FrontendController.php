<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Folder;
use App\User;
use App\Package;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class FrontendController extends Controller
{
    public function dashboard($value='')
    {
        $user= Auth::user();

        $user_role= $user->roles->pluck('name');
        
        if($user_role[0] == "User")
        {
            $files_count =File::where('created_by_id', $user->id)->get()->count();
            
            $folders =Folder::where('created_by_id', $user->id)->get();

            $used= ($files_count/$user->storage_limit)*100;
            $percentage= number_format((float)$used, 2, '.', '');

            if($user->storage_limit>20)
            {
                $user_type="Premium";
            }
            else{
                $user_type="Standard";
            }
            return view('frontend.dashboard', compact('user','files_count', 'folders', 'percentage', 'user_type'));
        }
        else{
            $users = User::all()->count();
            $files = FIle::all()->count();
            $folders = Folder::all()->count();
            $packages = Package::all()->count();
            return view('frontend.admindashboard', compact('users', 'files', 'folders', 'packages'));
        }
        
        
        
    }

   
}
