<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Folder;
use Illuminate\Support\Facades\Auth;

class TrashController extends Controller
{
    public function index()
    {
        $created_by = Auth::user()->id;
        
        $files =File::where('created_by_id', $created_by)->get();
        $folders = Folder::where('created_by_id', $created_by)->get();

        return view('frontend.trash', compact('files', 'folders'));
    }

    public function filerestore($id){
        $file = File::find($id);
        $file->status = 1;
        $file->save();
        return redirect()->route('trash.index')->with('success', 'Your file has been successfully restored!');
    }

    public function folderrestore($id){
        $folder = Folder::find($id);
        $files = File::where('folder_id', $folder->id)->get();
        foreach($files as $file)
        {
            $file->status = 1;
            $file->save();
        }
        $folder ->status =1;
        $folder->save();
        return redirect()->route('trash.index')->with('success', 'Your folder has been successfully restored!');
    }

    
}
