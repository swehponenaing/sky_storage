@extends('template')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title m-0 font-weight-bold text-primary">Edit Folder</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('folders.update',$folder->id)}}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('PUT')

                <input type="hidden" name="created_by_id" value="{{$created_by->id}}">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Folder Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{$folder->name}}">
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