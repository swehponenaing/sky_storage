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
        <div class="card-body">

            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered display no-wrap"
                style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Storage Amount</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @foreach($p as $row)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->storage_amount}}</td>
                        <td>{{$row->price}}</td>
                        <td>
                            <a href="{{route('packages.edit',$row->id)}}" class="btn btn-primary float-left mr-1"><i class="fas fa-edit"></i></a>


                            <form method="POST" action="{{route('packages.destroy',$row->id)}}" onsubmit="return confirm('Are you sure to delete this package?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                                <form>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Storage Amount</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection