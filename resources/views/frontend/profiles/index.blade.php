@extends('template')

@section('content')

@if($message= Session::get('error'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" >
            <p>{{$message }}</p>
            </div>
        </div>
    </div>
@endif

<div class="container">
    <h2 style="text-align: center;">Personal info</h2>
    <h4 style="text-align: center;">Basic info, like your name and photo, that you use on Sky Storage services</h4><br>

    <div class="row">
        <div class="col-md-12">
            <div class="card border mb-3">
                <div class="card-header bg-transparent border-success">
                    <h2>Profile</h2>
                    <p>Some info may be visible to other people using Google services.</p>
                </div>

                <div class="card-body">

                    <form action="" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-2">
                                <p>PHOTO</p>
                            </div>

                            <div class="col-7">
                                <p>A photo helps personalize your account</p>
                            </div>

                            <div class="col-3">
                                <a href="#" data-toggle="modal" data-target="#edit_photo">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="modal" data-target="#edit_photo"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img src="{{$user->photo}}" alt="user" class="rounded-circle"
                                    width="40" height="40">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                            </a>
                        </div>
                    </div>
                </form>
                <hr>

                <form action="" method="POST">
                    <div class="row">
                        <div class="col-2">
                            <p>NAME</p>
                        </div>

                        <div class="col-8">
                            <p>{{$user->name}}</p>
                        </div>

                        <div class="2">
                            <a href="#" data-toggle="modal" data-target="#edit_name">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </div>

                    </div>
                </form>
                <hr>

                <form action="" method="POST">
                    <div class="row">
                        <div class="col-2">
                            <p>Birthday</p>
                        </div>

                        <div class="col-8">
                            <p>{{$user->birthday}}</p>
                        </div>

                        <div class="2">
                            <a href="#" data-toggle="modal" data-target="#edit_birthday">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </div>

                    </div>
                </form>

                <hr>

                <form action="" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-2">
                            <p>GENDER</p>
                        </div>

                        <div class="col-8">
                            <p>{{$user->gender}}</p>
                        </div>

                        <div class="2">
                            <a href="#" data-toggle="modal" data-target="#edit_gender">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </form>
                <hr>
                <form action="" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-2">
                            <p>PASSWORD</p>
                        </div>

                        <div class="col-8">
                            <p>
                                @for($i=0; $i<$user->password_length; $i++)
                                *
                                @endfor
                            </p>

                        </div>

                        <div class="2">
                            <a href="#" data-toggle="modal" data-target="#edit_password">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card border mb-3">
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <h2>Contact info</h2>
                    <div class="row">
                        <div class="col-2">
                            <p>EMAIL</p>
                        </div>

                        <div class="col-8">
                            <p>{{$user->email}}</p>
                        </div>

                        <div class="2">
                            <a href="#" data-toggle="modal" data-target="#edit_email">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-2">
                            <p>PHONE</p>
                        </div>

                        <div class="col-8">
                            <p>{{$user->phone}}</p>
                        </div>

                        <div class="2">
                            <a href="#" data-toggle="modal" data-target="#edit_phone">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>


<!-- Edit Photo -->
<div class="modal fade" id="edit_photo" tabindex="-1" role="dialog" aria-labelledby="edit_photo" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="edit_photo">Upload Profile Photo Here</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>

  </div>

  <div class="modal-body">

    <form action="{{route('user.photo.edit', $user->id)}}" id="form" method="POST" enctype="multipart/form-data">

        @csrf

        @method('PUT')

        <div class="form-group">
            <label for="photo" class="col-form-label">Photo</label>
            <input type="file" name="photo" class="form-control" id="photo">
            <br>
            <button class="btn btn-secondary" onclick="showMain()">Cancel</button>
            <button type="submit" class="btn btn-secondary" onclick="showMain()">Done</button>
        </div>

    </form>

</div>
</div>
</div>
</div>

<!-- End Edit Photo -->

<!-- Edit Name -->
<div class="modal fade" id="edit_name" tabindex="-1" role="dialog" aria-labelledby="edit_name" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="edit_name">Change Name</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>

  </div>

  <div class="modal-body">

    <form action="{{route('user.name.edit', $user->id)}}" id="form" method="POST">

        @csrf

        @method('PUT')

        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
            <br>
            <button class="btn btn-secondary" onclick="showMain()">Cancel</button>
            <button type="submit" class="btn btn-secondary" onclick="showMain()">Done</button>
        </div>

    </form>

</div>


</div>
</div>
</div>

<!-- End Edit Name -->

<!-- Edit Birthday -->
<div class="modal fade" id="edit_birthday" tabindex="-1" role="dialog" aria-labelledby="edit_birthday" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="edit_birthday">Upload Birthday</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>

  </div>

  <div class="modal-body">

    <form action="{{route('user.birthday.edit', $user->id)}}" id="form" method="POST">

        @csrf

        @method('PUT')

        <div class="form-group">
            <label for="birthday" class="col-form-label">Birthday</label>
            <input type="date" name="birthday" class="form-control" id="birthday" value="{{$user->birthday}}">
            <br>
            <button class="btn btn-secondary" onclick="showMain()">Cancel</button>
            <button type="submit" class="btn btn-secondary" onclick="showMain()">Done</button>
        </div>

    </form>

</div>
</div>
</div>
</div>

<!-- Edit Gender -->
<div class="modal fade" id="edit_gender" tabindex="-1" role="dialog" aria-labelledby="edit_gender" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="edit_gender">Upload Gender</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>

  </div>

  <div class="modal-body">

    <form action="{{route('user.gender.edit', $user->id)}}" id="form" method="POST">

        @csrf

        @method('PUT')

        <div class="form-group">
            <input type="radio" name="gender" value="Female" id="gender">Female<br>
            <input type="radio" name="gender" value="Male" id="gender">Male<br>

            <br>
            <button class="btn btn-secondary" onclick="showMain()">Cancel</button>
            <button type="submit" class="btn btn-secondary" onclick="showMain()">Done</button>
        </div>

    </form>

</div>
</div>
</div>
</div>


<!-- End Edit Gender -->


<!-- Edit Password -->

<div class="modal fade" id="edit_password" tabindex="-1" role="dialog" aria-labelledby="edit_password" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="edit_password">Change Password</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>

  </div>

  <div class="modal-body">

    <form action="{{route('user.password.edit', $user->id)}}" id="form" method="POST">

        @csrf

        @method('PUT')

        <div class="form-group">
            <!-- <label for="old_password" class="col-form-label">Old Password</label>
              <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Enter Old Password">
              <br> -->
            <label for="password" class="col-form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter New Password">
            <br>

            <input type="password" name="confirmpassword" class="form-control" id="password" placeholder="Enter Confirm Password">
            <br>

            <button class="btn btn-secondary" onclick="showMain()">Cancel</button>
            <button type="submit" class="btn btn-secondary" onclick="showMain()">Done</button>
        </div>

    </form>
</div>
</div>
</div>
</div>
<!-- End Edit Password -->

<!-- Edit Email -->
<div class="modal fade" id="edit_email" tabindex="-1" role="dialog" aria-labelledby="edit_email" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="edit_email">Change Email</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>

  </div>

  <div class="modal-body">

    <form action="{{route('user.email.edit', $user->id)}}" id="form" method="POST">

        @csrf

        @method('PUT')

        <div class="form-group">
            <label for="email" class="col-form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
            <br>
            <button class="btn btn-secondary" onclick="showMain()">Cancel</button>
            <button type="submit" class="btn btn-secondary" onclick="showMain()">Done</button>
        </div>

    </form>

</div>
</div>
</div>
</div>
<!-- End Edit Email -->

<!-- Edit Phone -->
<div class="modal fade" id="edit_phone" tabindex="-1" role="dialog" aria-labelledby="edit_phone" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="edit_phone">Change Phone Number</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>

  </div>

  <div class="modal-body">

    <form action="{{route('user.phone.edit', $user->id)}}" id="form" method="POST">

        @csrf

        @method('PUT')

        <div class="form-group">
            <label for="phone" class="col-form-label">Phone</label>
            <input type="phone" name="phone" class="form-control" id="phone" value="{{$user->phone}}">
            <br>
            <button class="btn btn-secondary" onclick="showMain()">Cancel</button>
            <button type="submit" class="btn btn-secondary" onclick="showMain()">Done</button>
        </div>

    </form>

</div>
</div>
</div>
</div>
<!-- End Edit Phone -->

<!-- Edit Photo -->
@section('script')
<script type="text/javascript">
  $('#edit_photo').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var recipient = button.data('whatever') 
      var modal = $(this)
  })
</script>
@endsection
<!-- End Edit Photo -->

<!-- Edit Name -->
@section('script')
<script type="text/javascript">
  $('#edit_name').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var recipient = button.data('whatever') 
      var modal = $(this)
  })
</script>
@endsection
<!-- End Edit Name -->

<!-- Edit Birthday -->
@section('script')
<script type="text/javascript">
  $('#edit_birthday').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var recipient = button.data('whatever') 
      var modal = $(this)
  })
</script>
@endsection
<!-- End Edit Birthday -->


<!-- Edit Gender -->
@section('script')
<script type="text/javascript">
  $('#edit_gender').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var recipient = button.data('whatever') 
      var modal = $(this)
  })
</script>
@endsection
<!-- End Edit Gender -->

<!-- Edit Email -->
@section('script')
<script type="text/javascript">
  $('#edit_email').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var recipient = button.data('whatever') 
      var modal = $(this)
  })
</script>
@endsection
<!-- End Edit Email -->


<!-- Edit Phone -->
@section('script')
<script type="text/javascript">
  $('#edit_phone').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var recipient = button.data('whatever') 
      var modal = $(this)
  })
</script>
@endsection
<!-- End Edit Phone -->


@endsection


<script type="text/javascript">
    function modalShowPass() {
      var y = document.getElementById("hello");
      if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }
} 
</script>