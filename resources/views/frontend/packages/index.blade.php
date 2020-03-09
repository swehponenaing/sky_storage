@extends('template')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title m-0 font-weight-bold text-primary">Packages</h4>
                    </div>
                    <div class="col-2">
                        <a href="{{route('packages.create')}}"
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
        @foreach($packages as $row) 
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card" style="width: 13rem;"> 

                <div class="card-header" style="background-color: #ededed">
                    <img src="{{asset('image/package.svg')}}" class="card-img-fluid" alt="Package" width="100%">
                </div> 

                <div class="card-body" style="background-color: #ffffff;">

                    <h5 class="card-title" style="text-align: center;">{{$row->name}}</h5>
                    <p style="color: black; text-align: center;">Storage Amount: {{$row->storage_amount}}</p>
                    <div style="margin-left: 22%;">
                        <a href="{{route('packages.edit', $row->id)}}" type="submit" class="btn
                            btn-primary float-left mr-1" style="display: block;"> <i class="far
                            fa-edit"></i> </a>

                            <form method="POST" action="{{route('packages.destroy',$row->id)}}" onsubmit="return confirm('Are you sure to delete?')">
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