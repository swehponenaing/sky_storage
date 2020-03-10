<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Folder;
use App\User;
use App\Package;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

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
            $users_count = User::all()->count();
            $files_count = FIle::all()->count();
            $folders_count = Folder::all()->count();
            $packages_count= Package::all()->count();

            

            $package_user= DB::table('package_user')->join('users', 'users.id', '=', 'package_user.user_id')
                                                                                        ->join('packages', 'packages.id', '=', 'package_user.package_id')
                                                                                        ->select('package_user.*','users.name as uname','packages.price as price','packages.name as pname','packages.storage_amount as storageamt')
                                                                                        ->get();
                



            return view('frontend.admindashboard', compact('users_count', 'files_count', 'folders_count', 'packages_count','package_user'));
        }
        
        
        
    }

   
}
