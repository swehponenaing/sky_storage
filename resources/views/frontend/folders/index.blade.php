@extends('template')

@section('content')
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
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card" style="width: 13rem;"> 

                <div class="card-header" style="background-color: #ededed">
                    <img src="{{asset('image/folder1.png')}}" class="card-img-top" alt="" width="10px">
                </div> 

                <div class="card-body" style="background-color: #ffffff;">
                    <!-- #f5f5f5 -->


                    <h5 class="card-title" style="text-align: center;">{{$row->name}}</h5>
                    <div style="margin-left: 22%;">
                        <a href="{{route('folders.edit', $row->id)}}" type="submit" class="btn
                            btn-primary float-left mr-1" style="display: block;"> <i class="far
                            fa-edit"></i> </a>

                            <form method="POST" action="{{route('folders.destroy',$row->id)}}" onsubmit="return confirm('Are you sure to delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="display: block;">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                            
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>      
    </div>
    
    @endsection