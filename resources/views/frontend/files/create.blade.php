@extends('template')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title m-0 font-weight-bold text-primary">Upload File</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('files.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="created_by_id" value="{{$created_by}}">
                    <div class="form-group row">
                        <label for="folder_name" class="col-sm-2 col-form-label">Folder</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="folder_name">
                            
                        @foreach($folders as $folder)
                            <option>{{$folder->name}}</option>
                        @endforeach
                            </select>
                        </div>
                        
                    </div>
                    
                    <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">Upload File</label>
                        <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="file" name="filename[]" 
                        data-url="{{ route('frontend.files.upload')}}" data-bucket="filename" data-filekey="filename" id="my_id"
                        multiple>
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

@section('javascript')
    @parent

    <script src="{{ asset('fileupload_plugins/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('fileupload_plugins/jquery.fileupload.js') }}"></script>
    <script>
        $(function () {
            var exfiles = '<?php echo $userFilesCount; ?>';
            var existingFiles = Number(exfiles);


            $('input#my_id').change(function () {
                var uploadingFiles = $(this)[0].files;
                var totalCount = uploadingFiles.length + existingFiles;

                var Id = '<?php echo $roleId; ?>';
                var roleId = Number(Id);
                console.log(roleId);
                console.log(totalCount);
               
                if (totalCount > 5 && roleId == 2) {
                    alert("your upload limit is 5 files." +
                            "Upgrade to Premium and upload as many files you want");
                    $('.file-upload').each(function () {
                        var $this = $(this);

                        $(this).fileupload({
                            dataType: 'json',
                            formData: {
                                model_name: 'File',
                                bucket: $this.data('bucket'),
                                file_key: $this.data('filekey'),
                                _token: '{{ csrf_token() }}'

                            },

                            add: function (e, data) {
                                data.abort();
                            }
                        })
                    });
                    document.getElementById("submitBtn").classList.add('disabled');
                }
            });

            $('.file-upload').each(function () {
                var $this = $(this);
                var $parent = $(this).parent();

                $(this).fileupload({
                    dataType: 'json',
                    formData: {
                        model_name: 'File',
                        bucket: $this.data('bucket'),
                        file_key: $this.data('filekey'),
                        _token: '{{ csrf_token() }}'

                    },

                    add: function (e, data) {
                        data.submit();
                    },
                    done: function (e, data) {
                        $.each(data.result.files, function (index, file) {
                            var $line = $($('<p/>', {class: "form-group"}).html(file.name + ' (' + file.size + ' bytes)').appendTo($parent.find('.files-list')));
                            $line.append('<a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>');
                            $line.append('<input type="hidden" name="' + $this.data('bucket') + '_id[]" value="' + file.id + '"/>');
                            if ($parent.find('.' + $this.data('bucket') + '-ids').val() != '') {
                                $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + ',');
                            }
                            $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + file.id);
                        });
                        $parent.find('.progress-bar').hide().css(
                                'width',
                                '0%'
                        );
                    }

                }).on('fileuploadprogressall', function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $parent.find('.progress-bar').show().css(
                            'width',
                            progress + '%'
                    );
                });

            });
            $(document).on('click', '.remove-file', function () {
                var $parent = $(this).parent();
                $parent.remove();
                return false;
            });
        });
    </script>
@stop