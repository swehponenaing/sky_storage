<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="APPTON HTML5 Template is a simple Smooth Personal App Landing Template">
    <meta name="keywords" content="App, Landing, Business, Onepage, Html, Business">

    <title>File Storage Template</title>

    <link rel="shortcut icon" type="image/ico" href="{{asset('home_page/img/favicon.png')}}">

    <link href="{{asset('home_page/css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('home_page/css/theme.css')}}" rel="stylesheet">
    <link href="{{asset('home_page/css/icons.css')}}" rel="stylesheet">

    <link href="{{asset('home_page/style.css')}}" rel="stylesheet">
    <link href="{{asset('home_page/css/responsive.css')}}" rel="stylesheet">

    <script src="{{asset('home_page/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


  
</head>

<body data-spy="scroll" data-target=".mainmenu-area" data-offset="90">

    <!--SCROLL TO TOP-->
    <a href="#scroolup" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--START TOP AREA-->
    <header class="top-area" id="home">
        <div class="header-top-area" id="scroolup">

            <div class="mainmenu-area" id="mainmenu-area">
                <div class="mainmenu-area-bg"></div>
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="#home" class="navbar-brand"><img src="{{asset('home_page/img/logo.png')}}"></a>
                        </div>
                        <div id="main-nav" class="stellarnav">
                            <ul id="nav" class="nav navbar-nav pull-right">
                                <li class="active"><a href="#home">Home</a></li>
                                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li><a href="#fact">Fact</a></li>
                                @guest
                                <li>
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
                            @else
                                <li class="dropdown">
                                    <a href="javascript::void(0)" class="">{{ Auth::user()->name }}</a>
                                    <div class="dropdown-content">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color: #af1c1c;">
                                            {{ __('Logout') }}
                                        </a>
                                    </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                </li>
                        @endguest

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!--WELCOME SLIDER AREA-->
        <div class="welcome-slider-area white font16">
            <div class="welcome-single-slide">
                <div class="slide-bg-one slide-bg-overlay"></div>
                <div class="welcome-area">
                    <div class="container">
                        <div class="row flex-v-center">
                            <div class="col-md-8 col-lg-7 col-sm-12 col-xs-12">
                                <div class="welcome-text">
                                    <h1>Information is the oil of the 21st Century.</h1>
                                    <p>You are my header file which import  your all happiness, sadness, trust, love, care...etc</p>
                                    <p>You are my main function which can be kept  your all secrets.</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-single-slide">
                <div class="slide-bg-two slide-bg-overlay"></div>
                <div class="welcome-area">
                    <div class="container">
                        <div class="row flex-v-center">
                            <div class="col-md-8 col-lg-7 col-sm-12 col-xs-12">
                                <div class="welcome-text">
                                    <h1>Information is the oil of the 21st Century.</h1>
                                    <p>You are my header file which import  your all happiness, sadness, trust, love, care...etc</p>
                                    <p>You are my main function which can be kept  your all secrets.</p>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-single-slide">
                <div class="slide-bg-three slide-bg-overlay"></div>
                <div class="welcome-area">
                    <div class="container">
                        <div class="row flex-v-center">
                            <div class="col-md-8 col-lg-7 col-sm-12 col-xs-12">
                                <div class="welcome-text">
                                    <h1>Information is the oil of the 21st Century.</h1>
                                    <p>You are my header file which import  your all happiness, sadness, trust, love, care...etc</p>
                                    <p>You are my main function which can be kept  your all secrets.</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--WELCOME SLIDER AREA END-->
    </header>
    <!--END TOP AREA-->

    <!--DASHBOARD TOP AREA-->
    <section class="features-top-area" id="dashboard">
        <div class="container">
            <div class="row promo-content">
                <div class="col-md-2"></div>

                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="text-icon-box mb10 xs-mb0 wow fadeInUp padding20" data-wow-delay="0.1s">
                    	<center>
                        	<div class="box-icon features-box-icon">
                            	<i class="fa fa-cloud"></i>
                        	</div>
                        </center>
                        <h3 class="box-title" style="text-align: center;">Premium</h3>
                        <p style="text-align: center;">Premium => 30 Files Storage</p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="text-icon-box relative mb20 xs-mb0  wow fadeInUp padding30" data-wow-delay="0.2s">
                    	<center>
                        	<div class="box-icon features-box-icon">
                            	<i class="icofont icofont-business-man-alt-1"></i>
                        	</div>
                    	</center>
                        <h3 class="box-title" style="text-align: center;">Premium Plus</h3>
                        <p style="text-align: center;">Premium Plus => 50 Files Sotrage</p>
                    </div>
                </div>
            
             
            </div>
        </div>
    </section>
    <!--DASHBOARD TOP AREA END-->
   
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 col-sm-12 col-xs-12">
                    <div class="text-center wow fadeIn">
                        <h2 class="xs-font20">Store any file</h2>
                        <p>Keep photos, document. Your first 10 files storage are free with a Sky Account.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--FUN FACT AREA AREA-->
    <section class="fun-fact-area center white relative padding-100-70" id="fact">
        <div class="area-bg" data-stellar-background-ratio="0.6"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-fun-fact mb30 wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="font60 xs-font26"><span class="counter">10</span>files</h3>
                        <p class="font600">Free</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-fun-fact mb30 wow fadeInUp" data-wow-delay="0.2s">
                        <h3 class="font60 xs-font26"><span class="counter">30</span>files</h3>
                        <p class="font600">Platinum</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-fun-fact mb30 wow fadeInUp" data-wow-delay="0.3s">
                        <h3 class="font60 xs-font26"><span class="counter">50</span>files</h3>
                        <p class="font600">Platinum Plus</p>
                    </div>
                </div>              
            </div>
        </div>
    </section>
    <!--FUN FACT AREA AREA END-->

    <!--FOOTER AREA-->
    <footer class="footer-area sky-gray-bg relative">
        <div class="footer-top-area padding-80-80 bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                        <div class="single-footer footer-about sm-mb50 xs-mb50 sm-center xs-center">
                            <div class="footer-logo mb30">
                                <a href="#"><img src="{{asset('home_page/img/logo.png')}}" width="100px"></a>
                            </div>
                            <p>I am the storage device which stores all your memories</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-4 col-xs-12">
                        <div class="single-footer footer-list white xs-center xs-mb50">
                            <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a href="#dashboard">Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5 col-sm-8 col-xs-12">
                        <div class="single-footer footer-subscribe white xs-center">
                            <h3 class="mb30 xs-font18">See your stuff anywhere</h3>
                            <p style="text-indent: 1cm">Your files in Sky Storage can be reached from any smartphone, tablet, or computer. So wherever you go, your files follow.</p>
                            <div class="subscriber-form-area mt50 wow fadeIn">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="footer-copyright text-center wow fadeIn">
                            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved. Designed and Developed by <a
                    href="https://www.facebook.com/tildy.hsu"><span style="font-weight: bold;">Hsu Yati Khin</span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--FOOTER AREA END-->

    <!--====== SCRIPTS JS ======-->
    <script src="{{asset('home_page/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('home_page/js/vendor/bootstrap.min.js')}}"></script>

    <!--====== PLUGINS JS ======-->
    <script src="{{asset('home_page/js/vendor/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('home_page/js/vendor/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('home_page/js/vendor/jquery.appear.js')}}"></script>
    <script src="{{asset('home_page/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('home_page/js/stellar.js')}}"></script>
    <script src="{{asset('home_page/js/waypoints.min.js')}}"></script>
    <script src="{{asset('home_page/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('home_page/js/wow.min.js')}}"></script>
    <script src="{{asset('home_page/js/jquery-modal-video.min.js')}}"></script>
    <script src="{{asset('home_page/js/stellarnav.min.js')}}"></script>
    <script src="{{asset('home_page/js/placeholdem.min.js')}}"></script>
    <script src="{{asset('home_page/js/contact-form.js')}}"></script>
    <script src="{{asset('home_page/js/jquery.ajaxchimp.js')}}"></script>
    <script src="{{asset('home_page/js/jquery.sticky.js')}}"></script>

    <!--===== ACTIVE JS=====-->
    <script src="{{asset('home_page/js/main.js')}}"></script>

    <!--===== MAPS JS=====-->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTS_KEDfHXYBslFTI_qPJIybDP3eceE-A&sensor=false"></script>
    <script src="{{asset('home_page/js/maps.active.js')}}"></script>
</body>

</html>
