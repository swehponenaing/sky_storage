@extends('template')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title m-0 font-weight-bold text-primary">Create Package</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('packages.store')}}" method="POST">
                @csrf
                
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Package Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="storage">Storage Amount:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="storage" placeholder="Define Storage Amount" name="storage_amount">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="price">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" placeholder="Define Package's Price" name="price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="recommend" class="col-sm-2 col-form-label">Recommend</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="recommend" name="recommend">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
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