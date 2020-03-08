<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Folders and Files</title>
    <!-- Custom CSS -->
    <link href="{{asset('adminmart/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{asset('adminmart/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{asset('adminmart/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{asset('adminmart/dist/css/style.min.css') }}" rel="stylesheet">

    <!-- Tables page plugin CSS -->
    <link href="{{asset('adminmart/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">

<!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md">
            <div class="navbar-header" data-logobg="skin6">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.html">
                          <b class="logo-icon">
                            <img src="{{asset('home_page/img/logo.png') }}" alt="homepage" class="light-logo">
                        </b> 
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{asset('home_page/img/logo.png')}}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <!--  <img src="{{asset('adminmart/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /> -->
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto ml-3 pl-1">

                    <!-- ============================================================== -->
                    <!-- create new -->
                    <!-- ============================================================== -->

                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('image/user.png') }}" alt="user" class="rounded-circle"
                        width="40">
                        <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                        class="text-dark">{{Auth::user()->name}}</span> <i data-feather="chevron-down"
                        class="svg-icon"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="{{route('profiles.index')}}"><i data-feather="user"
                            class="svg-icon mr-2 ml-1"></i>
                        My Profile</a>
                        <a class="dropdown-item" href="javascript:void(0)"><i data-feather="credit-card"
                            class="svg-icon mr-2 ml-1"></i>
                        My Balance</a>
                        <a class="dropdown-item" href="javascript:void(0)"><i data-feather="mail"
                            class="svg-icon mr-2 ml-1"></i>
                        Inbox</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings"
                            class="svg-icon mr-2 ml-1"></i>
                        Account Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" aria-expanded="false" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="color: #af1c1c;">
                        <i data-feather="power"
                        class="svg-icon mr-2 ml-1"></i>
                    Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <div class="dropdown-divider"></div>
                    <div class="pl-4 p-3"><a href="javascript:void(0)" class="btn btn-sm btn-info">View
                    Profile</a></div>
                </div>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
        </ul>
    </div>
</nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('home')}}"
                    aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                    class="hide-menu">Dashboard</span></a></li>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap"><span class="hide-menu">User Management</span></li>

                    <li class="sidebar-item"> <a class="sidebar-link" href="#" aria-expanded="false">
                        <i class="fas fa-briefcase"></i>
                        <span class="hide-menu">Roles</span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="#" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <span class="hide-menu">Users</span></a>
                    </li>


                    <li class="list-divider"></li>
                    <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('folders.index')}}" aria-expanded="false">
                        <i class="fas fa-folder"></i>
                        <span class="hide-menu">Folders</span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('files.index') }}" aria-expanded="false">
                        <i class="fas fa-file"></i>
                        <span class="hide-menu">Files</span></a>
                    </li>


                    <li class="sidebar-item">

                    @if(Auth::user()->name=='Admin')
                    <a class="sidebar-link sidebar-link" href="{{ route('packages.index') }}" aria-expanded="false">
                        
                    @else
                    <a class="sidebar-link sidebar-link" href="{{ route('userpackage') }}" aria-expanded="false">
                    @endif

                    <i class="fas fa-ticket-alt"></i>
                        <span class="hide-menu">Packages</span></a>
                    </li>


                    <li class="sidebar-item"> 
                        <a class="sidebar-link sidebar-link" href="{{ route('logout') }}" aria-expanded="false" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="color: #af1c1c;">
                        <i class="fas fa-power-off"></i>
                        <span class="hide-menu">Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            @yield('content')
        </div>


        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center text-muted">
            All Rights Reserved. Designed and Developed by <a
            href="https://www.facebook.com/venishz">Swe Hpone Naing</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('adminmart/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{asset('adminmart/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{asset('adminmart/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- apps -->
<!-- apps -->
<script src="{{asset('adminmart/dist/js/app-style-switcher.js') }}"></script>
<script src="{{asset('adminmart/dist/js/feather.min.js') }}"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('adminmart/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{asset('adminmartassets/extra-libs/sparkline/sparkline.js') }}"></script>

<!--Menu sidebar -->
<script src="{{asset('adminmart/dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{asset('adminmart/dist/js/custom.min.js') }}"></script>

<!--This page plugins -->
<script src="{{asset('adminmart/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('adminmart/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>

@yield('script')
</body>

</html>