
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('adminmart/assets/images/favicon.png')}}">
    <title>Register Page</title>
    <!-- Custom CSS -->
    <link href="{{asset('adminmart/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
        style="background:url(adminmart/assets/images/big/auth-bg.jpg) no-repeat center center;">
        <div class="auth-box row text-center">
            <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(adminmart/assets/images/big/2.jpg);">
            </div>
            <div class="col-lg-5 col-md-7 bg-white">
                <div class="p-3">
                    <img src="adminmart/assets/images/big/icon.png" alt="wrapkit">
                    <h2 class="mt-3 text-center">Sign Up for Free</h2>

                    <form class="mt-4" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">

                            <!-- <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control @error('photo') is-invalid @enderror" type="file" placeholder="Your photo" name="photo"  required autocomplete="photo" autofocus>

                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div> -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Your name" name="name"  required autocomplete="name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email Address" name="email" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
                            </div>
                            <div class="col-lg-12 text-center mt-5">
                                Already have an account? <a href="#" class="text-danger">Sign In</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- All Required js -->
<!-- ============================================================== -->
<script src="{{asset('adminmart/assets/libs/jquery/dist/jquery.min.js')}} "></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('adminmart/assets/libs/popper.js/dist/umd/popper.min.js')}} "></script>
<script src="{{asset('adminmart/assets/libs/bootstrap/dist/js/bootstrap.min.js')}} "></script>
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<script>
    $(".preloader ").fadeOut();
</script>
</body>

</html>