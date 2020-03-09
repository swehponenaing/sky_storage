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
        return redirect()->route('folders.index')->with('success', 'Folder has successfully updated!');
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

        return redirect()->route('trash.index')->with('success', 'Your folder, including it\'s files has been permanently deleted!');
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

    public function showfile($id)
    {
        $created_by= Auth::user()->id;;
        $files= File::where('folder_id', $id)->get();
        $folder_id= $id;
        return view('frontend.folders.showfile', compact('files', 'folder_id', 'created_by'));
    }

    public function uploadfile(Request $request)
    {
        $user = Auth::user();
        $files_count = File::where('created_by_id', $user->id)->count();
    
        $request->validate([
            'file' => 'required',
            'file.*' => 'mimes: doc, pdf, txt, docx, pptx, zip, jpg, jpeg, png, svg, xml, html, csv,',
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
            $file->folder_id= request('folder_id');
            $file->created_by_id=request('created_by_id');
            $file->save();
            return redirect()->route('showfolderfile', $request->folder_id)->with('success', 'Your file has successfully uploaded!');
           }
           else{
            return redirect()->route('showfolderfile')->with('limit', 'Your storage limit is full');
           }
    }

    public function temporarydelete($id){
        $folder = Folder::find($id);
        $files = File::where('folder_id', $folder->id)->get();
        foreach($files as $file)
        {
            $file->status = 0;
            $file->save();
        }
        $folder->status = 0;
        
        $folder->save();
        return redirect()->route('folders.index')->with('success', 'Your folder, including it\'s files, has deleted successfully! You can restore it later inside Trash tab.');
    }
    
    
}
