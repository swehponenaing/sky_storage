@extends('template')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-12">
                        <h4 class="card-title m-0 font-weight-bold text-primary">Roles</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <label class="col-sm-2" for="name">Name:</label>
                    <label class="col-sm-2" for="name">{{$role->name}}</label>
                </div>

                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered display no-wrap"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                        @foreach($users as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>
                                <a href="{{route('users.show', $row->id)}}"  class="btn btn-success float-left mr-1">
                                <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{route('users.edit', $row->id)}}"  class="btn btn-primary float-left mr-1">
                                <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{route('users.destroy',$row->id)}}"
                                    onsubmit="return confirm('Are you sure?')" class="float-left">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit "class="btn btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
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