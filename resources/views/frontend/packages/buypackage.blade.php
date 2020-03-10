@extends('template')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title m-0 font-weight-bold text-primary">Buy Package</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
            	                Choose Payment Type<br>

        <i class="fa fa-cc-paypal" style="color: blue;font-size: 30px;padding: 5px;" onclick="document.getElementById('form').style.display='block';"></i>

        <i class="fa fa-cc-visa" style="color: blue;font-size: 30px;padding: 5px;" onclick="document.getElementById('form').style.display='block';"></i>

        <i class="fa fa-cc-mastercard" style="color: blue;font-size: 30px;padding: 5px;" onclick="document.getElementById('form').style.display='block';"></i>

        <i class="fa fa-credit-card" style="color: blue;font-size: 30px;padding: 5px;" onclick="document.getElementById('form').style.display='block';"></i>

        <br>
                <form action="{{route('buypackagestore')}}" method="POST">
                @csrf

<input type="hidden" name="package_id" value="{{$package->id}}">
        <div class="form-group">
            <label for="account" class="col-form-label">Account:</label>
            <input type="text" class="form-control" id="account">
            <br>
            <button class="btn btn-success"  type= "submit" onclick="showMain()">Payment</button>

         </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection