@extends('template')

@section('content')

@if($message= Session::get('success'))

    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" >
            <p>{{$message }}</p>
            </div>
        </div>
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title m-0 font-weight-bold text-primary">Folders</h4>
                    </div>
                    <div class="col-2">
                        <a href="{{route('folders.create')}}"
                        class="btn waves-effect waves-light btn-primary btn-block float-right">
                        <i class="fa fa-plus">Add New</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container">
    <div class="row">
        @foreach($folders as $row) 
        @if($row->status == 1)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card" style="width: 13rem;"> 

                <div class="card-header" style="background-color: #ededed">
                    <a href="{{route('showfolderfile', $row->id)}}">
                        <img src="{{asset('image/folder1.png')}}" class="card-img-top" alt="" width="10px">
                    </a>
                </div> 

                <div class="card-body" style="background-color: #ffffff;">

                    <h5 class="card-title" style="text-align: center;">{{$row->name}}</h5>
                    <div style="margin-left: 8%;">
                        <a href="{{route('folders.edit', $row->id)}}" type="submit" class="btn
                        btn-primary float-left mr-1">
                            <i class="far fa-edit"></i> 
                        </a>
                        <a href="{{route('folders.downloadzip', $row->id)}}" type="submit" class="btn
                        btn-primary float-left mr-1"> 
                            <i class="fas fa-download"></i> 
                        </a>

                        <a href="{{route('foldertemporarydelete', $row->id)}}" class="btn btn-danger float-left" onclick="return confirm('Are you sure to delete?')">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        </div>

                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>      
    </div>
    
    @endsection