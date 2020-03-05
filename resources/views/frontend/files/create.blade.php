@extends('template')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title m-0 font-weight-bold text-primary">Upload File</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('files.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="created_by_id" value="{{$created_by}}">
                    <div class="form-group row">
                        <label for="folder_name" class="col-sm-2 col-form-label">Folder</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="folder_name" name="folder_id">
                            
                        @foreach($folders as $folder)
                            <option value="{{$folder->id}}">{{$folder->name}}</option>
                        @endforeach
                            </select>
                        </div>
                        
                    </div>
                    
                    <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">Upload File</label>
                        <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="file" name="file">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i>Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
