@extends('template')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title m-0 font-weight-bold text-primary">Files</h4>
                    </div>
                    <div class="col-2">
                        <a href="{{route('files.create')}}"
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
                                <th>File Name</th>
                                <th>Folder</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                        @foreach($files as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->old_name}}</td>
                                <td>{{$row->folder->name}}</td>
                                <td>
                                <a href="{{route('files.show', $row->id)}}"  class="btn btn-success float-left mr-1">
                                <i class="fas fa-eye"></i>
                                </a>
                                <a href="/files/download/{{$row->id}}"  class="btn btn-primary float-left mr-1">
                                <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-danger float-left">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>File Name</th>
                                <th>Folder</th>
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