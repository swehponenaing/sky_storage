@extends('template')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-12">
                        <h4 class="card-title m-0 font-weight-bold text-primary">Roles: {{$role->name}}</h4>
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
                                <th>Email</th>
                                <th>Storage Limit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $j=1; @endphp
                        @for ($i=0; $i < count($user); $i++) 
                            
                       
                            @foreach($user[$i] as $row)
                                <tr>
                                    <td>{{$j++}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->storage_limit}}</td>
                                    <td>
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
                        @endfor
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Storage Limit</th>
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