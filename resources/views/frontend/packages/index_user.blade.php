@extends('template')

@section('content')

<div class="container">
	<h2 style="text-align: center;">Upgrade for more storage</h2>
		<br>
			<h4 style="text-align: center;">Get more space and extra benefits</h4>
		<br>
	<div class="row">

		<div class="col-lg-4 col-md-4 col-sm-12">	
			<div class="card" style="width: 17rem;">
				<div class="card-body" style="text-align: center; color: black;">
					<br>
					<h1 class="card-title">10 Files</h1>
					<h4>Free</h4>
					<button disabled="" class="btn btn-secondary">Current plan</button><br>
					<hr style="background-color: white;">
					<p class="card-text" style="text-align: left;">includes</p>
					<div class="row">
						<div class="col-sm-2">
							<p>✔️</p>
						</div>
						<div class="col-sm-10">
							<p style="text-align: left;">50 files storage</p>
						</div>
					</div>
					<br><br>
				</div>
			</div>
		</div>

@foreach($packages as $row)
		<div class="col-lg-4 col-md-4 col-sm-12">	
			<div class="card" style="width: 17rem;">				
				<div class="card-body" style="text-align: center; color: black;">
					<h4 style="color: #f1948a; font-weight: bold;">Recommended</h4>
					<h1 class="card-title">{{$row->storage_amount}} Files</h1>
					<br>
					<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#buy_package">MMK {{$row->price}}</a><br>
					<hr style="background-color: white;">
					<p class="card-text" style="text-align: left;">includes</p>
					<div class="row">
						<div class="col-sm-2">
							<p>✔️</p>
							<p>✔️</p>
						</div>
						<div class="col-sm-10">
							<p style="text-align: left;">{{$row->storage_amount}} files storage</p>
							<p style="text-align: left;">Extra member benefits</p>
						</div>
					</div>	
					
				</div>
			</div>
		</div>
@endforeach
	</div>
</div>

<div class="modal fade" id="buy_package" tabindex="-1" role="dialog" aria-labelledby="buy_package" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">

        <h3 style="text-align: center;" class="modal-title" id="buy_package">💫Buying Storage Amount💫</h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body">


        Choose Payment Type<br>

        <i class="fa fa-cc-paypal" style="color: blue;font-size: 30px;padding: 5px;" onclick="document.getElementById('form').style.display='block';"></i>

        <i class="fa fa-cc-visa" style="color: blue;font-size: 30px;padding: 5px;" onclick="document.getElementById('form').style.display='block';"></i>

        <i class="fa fa-cc-mastercard" style="color: blue;font-size: 30px;padding: 5px;" onclick="document.getElementById('form').style.display='block';"></i>

        <i class="fa fa-credit-card" style="color: blue;font-size: 30px;padding: 5px;" onclick="document.getElementById('form').style.display='block';"></i>

        <br>


        <form style="display: none;" id="form">

          <div class="form-group">
            <label for="account" class="col-form-label">Account:</label>
            <input type="text" class="form-control" id="account">
            <br>
            <a class="btn btn-success" href="{{route('buypackage', $row->id)}}" onclick="showMain()">Payment</a>

          </div>

        </form>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
  $('#buy_package').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 

  var recipient = button.data('whatever')
  var modal = $(this)
  modal.find('.modal-body input').val(recipient)
})
</script>
@endsection


<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

