<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Folder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\StoreFoldersRequest;
use ZipArchive;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $created_by = Auth::user()->id;
        $folders =Folder::where('created_by_id', $created_by)->get();
        return view('frontend.folders.index', compact('folders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $created_by = Auth::user();
        $folders=Folder::all();
        return view('frontend.folders.create', compact('created_by', 'folders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoldersRequest $request)
    {

        $folder = Folder::create($request->all());

        return redirect()->route('folders.index');
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
        $folder=Folder::find($id);
        return view('frontend.folders.edit',compact('folder','created_by'));
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

        // validation //
        $request->validate([

            "name" => 'required',  

        ]);



       // Store Data //(4)
        $folder = Folder::find($id);

        $folder->name =request('name');
        // $folder->created_by_id=request('user');


        $folder->save();


       // Return redirect //(5)
        return redirect()->route('folders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $folder = Folder::find($id);
        $folder->delete();

        return redirect()->route('folders.index');
    }

    public function download($id)
    {
        
    }

    public function showfile($id)
    {
        $files= File::where('folder_id', $id)->get();
        return view('frontend.folders.showfile', compact('files'));
    }

    public function downloadZip($id)
    {
        $folder = Folder::find($id);
        $files = File::where('folder_id', $id)->get();
        $zipname = $folder->name.".zip";
       
        $zip = new ZipArchive;
        $zip->open($zipname, ZipArchive::CREATE);
        
        foreach ($files as $file) {
            $file_path=$file->path;
            $zip->addFile($file_path, $file->old_name);
          }
        $zip->close();

          if(file_exists($zipname))
          {
            header('Content-Type: application/zip');
            header('Content-disposition: attachment; filename='.$zipname);
            header('Content-Length: ' . filesize($zipname));
            readfile($zipname);
            unlink($zipname);
            return redirect()->route('folders.index');
          }
          
        
    }
    
}
