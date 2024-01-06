<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FOREMAN</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- IonIcons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
        <!-- Toastr -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <!--
    `body` tag options:

    Apply one or more of the following classes to to the body tag
    to get the desired effect

    * sidebar-collapse
    * sidebar-mini
    -->
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        /* Menggunakan Material Icons */
        .material-icons {
            font-family: 'Material Icons', 'Open Sans'; /* Prioritaskan Material Icons, dan fallback ke Open Sans */
        }
    </style>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light" style="background-color: #2a78ac; color:beige">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"  style="color:beige"><i class="fas fa-bars"></i></a>
        </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
            <div class="user-panel d-flex">
              <div class="info">
                <p class="d-block mt-1"> Hi, Selamat datang {{Auth::user()->name}}</p>
                </div>
              <div class="image mt-1">
              <img src="{{asset('template/dist/img/wibu.png')}}" class="img-circle elevation-1" alt="User Image">
              </div>
          </div>
      </li>
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button"  style="color:rgba(245, 245, 220, 0.919)">
        <i class="fas fa-expand-arrows-alt mt-1"></i>
        </a>
    </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4" style="background-color: #464646;">
        <!-- Brand Logo -->
        <div class="brand-link" style="background-color: #1e7ebd; padding-top: 19.73px; padding-bottom: 19.73px; ">
        {{-- <a href="index3.html" class="brand-link"> --}}
        <img src="{{asset('template/dist/img/forman2.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text" style="color: azure">Foreman</span>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-2 d-flex">
            <div class="image">
            <img src="{{asset('template/dist/img/wibu.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <div class="d-block" style="color: azure">{{Auth::user()->name}}</div>
            </div>
        </div>

        <div class="sidebar">
          <div class="user-panel mt-2 pb-3 mb-2 d-flex">
          <!-- Sidebar user panel (optional) -->
          {{-- <div class="info"> --}}
            <div class="image">
              <a href="logout" class="link-website" style="text-decoration:none; color:azure;"> 
                <i href="logout" class="fas fa-solid fa-power-off" style="color: azure"> &nbsp; &nbsp; </i>  Logout
              </a>
              </div>
              <div class="info">
                <a href="logout" class="d-block"> 
                  
                </a>
                </div>
            {{-- </div> --}}
          </div>
        {{-- <li class="nav-item">
          <a class="nav-link" href="logout" style="vertical-align: center;">
          <i class="fas fa-solid fa-power-off"></i>
          </a>
      </li> --}}
            </ul>
        </nav>
        </div>
    </aside>
 
    <div class="content-wrapper">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mt-2">
            </div>
        </div>
        </div>
        {{-- <div class="content">
            <div class="col-12">
                <div class="card"> --}}
                    @yield('content')
                {{-- </div>
            </div>
        </div> --}}
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    {{-- <div class="content-wrapper"> --}}
        {{-- <div class="justify-content-between" style="text-justify:center;"> --}}

        {{-- <footer style="text-align: center; ">
          <strong style="color: rgba(0, 0, 0, 0.607)">Copyright &copy; 2023 <a>Angkasa Pura II</a>.</strong>
        </footer> --}}
          {{-- <footer class="main-footer" style="text-align: center">
            <strong style="color: rgba(0, 0, 0, 0.607)">Copyright &copy; 2023 <a>Angkasa Pura II</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
            </div>
        </footer> --}}
        </div>
  
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE -->
    <script src="{{asset('template/dist/js/adminlte.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('template/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('template/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('template/plugins/chart.js/Chart.min.js')}}"></script>

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

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{asset('template/plugins/chart.js/Chart.min.js')}}"></script>
    {{-- <!-- AdminLTE for demo purposes -->
    <script src="{{asset('template/dist/js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('template/dist/js/pages/dashboard3.js')}}"></script> --}}
    </body>
</html>
