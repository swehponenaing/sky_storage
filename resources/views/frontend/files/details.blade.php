@extends('template')

@section('content')

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<!-- <iframe src="{{asset($file->path)}}" frameborder="0"></iframe> -->

		<!-- <embed src="{{asset($file->path)}}" width="100%" height="600px" /> -->
			@if($file->mime_type=="application/pdf")
			
			<div class="embed-responsive embed-responsive-16by9">
					<iframe src="{{asset($file->path)}}" class="embed-responsive-item"></iframe>
			</div>
			@elseif($file->mime_type == "image/jpeg" | $file->mime_type == "image/png" | $file->mime_type == "image/svg+xml")
			
			<img src="{{asset($file->path)}}"  class="img-responsive mx-auto" alt="image" style=" max-width:400px; height: auto; display: block;">
			
			
			@endif
	</div>
</div>
@endsection