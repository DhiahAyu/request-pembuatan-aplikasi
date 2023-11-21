<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
    
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

    <!-- Preloader -->
    {{-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{asset('template/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div> --}}

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
        <img src="template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info" style="width: 100%">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
            <div class="text-center">
                <a href="logout" class="btn btn-info" style="align-items: flex-end">
                    <i class="fas fa-solid fa-power-off"></i>
                </a>
                
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <ul class="nav">
                    @if (Auth::user()->role=='user')
                    <li class="nav-item">
                        <a href="./tambahrequest" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Form Request</p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="./user" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Change Request Analysis</p>
                        </a>
                    </li> --}}
                    @endif
                
                    @if (Auth::user()->role=='admin')
                    <li class="nav-item">
                        <a href="./tambahchangerequest" class="nav-link" id="changeRequestLink" style="text-decoration: line-through;">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Form Change Request</p>
                        </a>
                    </li>                                       
                    @endif
                    @if (Auth::user()->role=='admin')
                    <li class="nav-item">
                        <a href="./tambahdatacra" class="nav-link" id="changeRequestLink" style="text-decoration: line-through;">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Change Request Analysis</p>
                        </a>
                    </li>                                       
                    @endif
                </ul>
            </li>

            <li class="nav-item">
                <ul class="nav">
                    @if (Auth::user()->role=='user')
                    <li class="nav-item">
                        <a href="./user" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Request Tables</p>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role=='admin')
                    <li class="nav-item">
                        <a href="./admin" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Change Request Tables</p>
                        </a>
                    </li>
                    @endif
                </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <!-- <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
        </div>
    </footer> -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="template/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="template/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="template/plugins/raphael/raphael.min.js"></script>
    <script src="template/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="template/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="template/plugins/chart.js/Chart.min.js"></script>

    <!--Toastr-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}")
        @endif
    </script>

    <script>
        document.getElementById("changeRequestLink").addEventListener("click", function(event) {
            event.preventDefault(); // Mencegah tindakan default tautan
            // Tambahkan logika tambahan di sini jika diperlukan
        });
    </script>

    <!-- AdminLTE for demo purposes -->
    <!-- <script src="template/dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="template/dist/js/pages/dashboard2.js"></script> -->
   </body>
</html>