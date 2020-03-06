@extends('template')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title m-0 font-weight-bold text-primary">Edit Package</h4>
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

                <form action="{{route('packages.update',$package->id)}}" method="POST" enctype="multipart/form-data">
                 @csrf

                @method('PUT')
                
                
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Package Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{$package->name}}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="storage">Storage Amount:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="storage" placeholder="Define Storage Amount" name="storage_amount" value="{{$package->storage_amount}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="price">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" placeholder="Define Package's Price" name="price" value="{{$package->price}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="recommend" class="col-sm-2 col-form-label">Recommend</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="recommend" name="recommend">
                            
                                <option value="1" @if($package->recommend == 1){{'selected'}} @endif >Yes</option>
                                <option value="0" @if($package->recommend == 0){{'selected'}} @endif>No</option>
                            </select>
          
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