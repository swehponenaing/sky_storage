@extends('template')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>

    <div class="container-fluid">
    	<div class="row">
    		<div class="col-lg-12 col-md-12 col-sm-12">
    			<!-- <iframe src="{{asset($file->path)}}" frameborder="0"></iframe> -->

    			<!-- <embed src="{{asset($file->path)}}" width="100%" height="600px" /> -->
					@if($file->mime_type=="application/pdf")
    				<embed src="{{asset($file->path)}}" type="application/pdf" width="100%" height="600px" />
					@elseif($file->mime_type == "image/jpeg" | $file->mime_type == "image/png" | $file->mime_type == "image/svg+xml")
					
					<img src="{{asset($file->path)}}"  class="img-responsive mx-auto" alt="image" style=" max-width:400px; height: auto; display: block;">
					
					
					@endif
    		</div>
    	</div>
    </div>

</body>
</html>
@endsection