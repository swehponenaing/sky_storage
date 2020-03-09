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
                    <div class="col-12">
                        <h4 class="card-title m-0 font-weight-bold text-primary">Trashes</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="zero_config" class="table table-hover"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 30px;">No</th>
                                <th>Name</th>
                                <th>Folder</th>
                                <th>Restore</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                        <!-- Folders -->
                        @foreach($folders as $row)
                        @if($row->status == 0)
                        <tr>
                            
                            <td>{{$i++}}</td>
                            <td>
                            <div class="float-left mr-2">
                                <i class="fa fa-folder" style="color: #d41cce; width: 20px; height: 20px;"></i>
                            </div>
                                {{$row->name}}

                            </td>
                            <td>
                            <img src="{{asset('image/folder1.png')}}"  alt="" width="40rem;">
                            </td>
                            
                            <td>
                            <a href="{{route('folderrestore', $row->id)}}"  class="btn btn-success float-left mr-1">
                                <i class=" fas fa-reply-all"></i>
                            </a>
                         
                            <form method="POST" action="{{route('folders.destroy',$row->id)}}" onsubmit="return confirm('Are you sure you want to delete? This will permanentely delete your data!')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-auto" >
                                <i class="far fa-trash-alt"></i>
                            </button>
                            </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach

                        <!-- Files -->
                        @foreach($files as $row)
                        @if($row->status == 0)
                           
                            <tr>
                            
                                <td>{{$i++}}</td>
                                <td>
                                <div class="float-left mr-2">
                                    @if($row->mime_type == "application/pdf")
                                    <i class="fa fa-file-pdf-o" style="color:red; width: 20px; height: 20px;"></i>
                                    @elseif($row->mime_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
                                    <i class="fas fa-file-word" style="color: #666af2; width: 20px; height: 20px;"></i>
                                    @elseif($row->mime_type == "application/vnd.openxmlformats-officedocument.presentationml.presentation")
                                    <i class="fas fa-file-powerpoint" style="color: #eb8334; width: 20px; height: 20px;"></i>
                                    @elseif($row->mime_type == "application/zip")
                                    <i class="fas fa-file-archive" style="color: #eb8334; width: 20px; height: 20px;"></i>
                                    @elseif($row->mime_type == "text/plain" | $row->mime_type == "text/csv" | $row->mime_type == "text/html")
                                    <i class="fas fa-file-alt" style="color: blue; width: 20px; height: 20px;"></i>
                                    @elseif($row->mime_type == "image/jpeg" | $row->mime_type == "image/png" | $row->mime_type == "image/svg+xml")
                                    <img src="{{asset($row->path)}}" class="img-fluid" style="width: 20px; height: 20px;">

                                    @endif
                                </div>
                                {{$row->old_name}}
                                </td>
                                <td>{{$row->folder->name}}</td>
                                <td>
                                <a href="{{route('filerestore', $row->id)}}"  class="btn btn-success float-left mr-1">
                                    <i class=" fas fa-reply-all"></i>
                                </a>
                             
                                <form method="POST" action="{{route('files.destroy',$row->id)}}" onsubmit="return confirm('Are you sure you want to delete? This will permanentely delete your data!')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-auto" >
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                </form>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Folder</th>
                                <th>Restore</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection