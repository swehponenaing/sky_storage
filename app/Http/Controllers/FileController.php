<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Folder;
use App\User;
use App\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $created_by = Auth::user()->id;
        $files =File::where('created_by_id', $created_by)->get();
        $folders= Folder::all();
        return view('frontend.files.index', compact('files', 'folders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        $created_by=Auth::user()->id;
        $folders=Folder::where('created_by_id', $created_by)->get();
 

        return view('frontend.files.create', compact('folders', 'created_by'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $files_count = File::where('created_by_id', $user->id)->count();
    
        $request->validate([
            'file' => 'required',
            'file.*' => 'mimes: doc, pdf, txt, docx, pptx, zip, jpg, jpeg, png, svg, xml, html, csv',
            'folder_id' => 'required',
            'created_by_id' =>'required'
           ]);
        
           if($request->hasfile('file'))
           {
                  $file=  $request->file('file');
                
                  $oldname=$file->getClientOriginalName();
                  $upload_name=time().'.'.$file->getClientOriginalExtension();
                  //$file_name=pathinfo($oldname, PATHINFO_FILENAME);
                  $file->move(public_path('storage/files'), $upload_name);  
                  $path='storage/files/'.$upload_name;
                  $mime_type=$file->getClientMimeType();
                  
           }
           
        
           if($files_count < $user->storage_limit)
           {
            $file= new File();
            $file->path=$path;
            $file->old_name= $oldname;
            $file->file_name= $upload_name;
            $file->mime_type= $mime_type;
            $file->folder_id=request('folder_id');
            $file->created_by_id=request('created_by_id');
            $file->save();
            return redirect()->route('files.index');
           }
           else{
            return redirect()->route('files.index')->with('limit', 'Your storage limit is full');
           }

          

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = FIle::find($id); 


        return view('frontend.files.details', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function download($id)
    {
        $file = File::find($id);

       return response()->download($file->path, $file->old_name);
    }
}
