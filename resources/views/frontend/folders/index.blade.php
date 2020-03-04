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
            <div class="card-body">

                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered display no-wrap"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                        @foreach($folders as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->user->name}}</td>
                                <td>
                                <a href="#"  class="btn btn-outline-primary float-left">
                                <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-outline-danger float-left">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Created By</th>
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