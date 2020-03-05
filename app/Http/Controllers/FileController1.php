<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Faker\Provider\Uuid;
use App\Http\Requests\StoreFilesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Folder;
use App\File;

class FileController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.files.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
        // $folders = Folder::where('created_by_id',$created_by)->get();
        // // dd($folder);
        // return view('frontend.files.create', compact('created_by','folders'));


        $roleId = Auth::getUser()->role_id;
        $userFilesCount = File::where('created_by_id', Auth::getUser()->id)->count();
        if ($roleId == 2 && $userFilesCount > 5) {
            return redirect('/frontend/files');
        }

        $folders=Folder::all();
        $created_by=Auth::user()->id;

        return view('frontend.files.create', compact('folders', 'created_by', 'userFilesCount', 'roleId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilesRequest $request)
    {
      
            $request = $this->saveFiles($request);
            dd($request);
            $data = $request->all();
            $fileIds = $request->input('filename_id');

            foreach ($fileIds as $fileId) {
                $file = File::create([
                    'id' => $fileId,
                    'uuid' => (string)\Webpatser\Uuid\Uuid::generate(),
                    'folder_id' => $request->input('folder_id'),
                    'created_by_id' => Auth::getUser()->id

                ]);
            }

            foreach ($request->input('filename_id', []) as $index => $id) {
                $model = config('medialibrary.media_model');
                $file = $model::find($id);
                $file->model_id = $file->id;
                $file->save();
            }
            return redirect()->route('frontend.files.index');
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
}
