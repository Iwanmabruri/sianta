<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from appstack.bootlab.io/pages-blank by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Feb 2024 03:05:19 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">

    <title>@yield('judul')</title>

    <link rel="canonical" href="pages-blank-2.html" />
    <link rel="shortcut icon" href="img/smk.png">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <!-- Choose your prefered color scheme -->
    <!-- <link href="css/light.css" rel="stylesheet"> -->
    <!-- <link href="css/dark.css" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <!-- Remove this after purchasing -->
    <link class="js-stylesheet" href="{{ asset('css/light.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    {{-- <link href="{{asset('DataTables/datatables.min.css')}}" rel="stylesheet">
    <script src="{{asset('DataTables/datatables.min.js')}}"></script> --}}
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.0/datatables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/v/dt/dt-2.0.0/datatables.min.js"></script>
    <!-- END SETTINGS -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q3ZYEKLQ68"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Q3ZYEKLQ68');
    </script>

    <style>
        #loading {
            height: 100%;
            width: 100%;
            position: fixed;
            align-items: center;
            padding: 20% 0;
            justify-content: center;
            text-align: center;
            display: flex;
            left: 0;
            top: 0;
            min-height: 100%;
            height: auto;
            /* background-color: rgba(0, 0, 0, .5); */
            background-color: aliceblue;
            z-index: 99999;
            display: none;
        }
    </style>
</head>
<!--
  HOW TO USE:
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div id="loading" class="">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
                <a class='sidebar-brand' href="{{ url('/') }}">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20"
                        enable-background="new 0 0 20 20" xml:space="preserve">
                        <path d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4
              C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z" />
                        <path d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z" />
                        <path d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z" />
                    </svg>

                    <span class="align-middle me-3">SIANTA</span>
                </a>

                <ul class="sidebar-nav mt-4">
                    {{-- <li class="sidebar-header">
                        Pages
                    </li> --}}

                    <li class="sidebar-item">
                        <a class='sidebar-link' href="{{ url('/') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">Data
                                Induk</span>
                        </a>
                        <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/program') }}">Data
                                    Jurusan</a>
                            </li>
                            <li class="sidebar-item"><a class='sidebar-link' href="{{ url('/student') }}">Data
                                    Siswa</a></li>
                            <li class="sidebar-item"><a class='sidebar-link' href="{{ url('/employee') }}">Data
                                    Pegawai</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link">
                            <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Data
                                Sekolah</span>
                        </a>
                        {{-- <ul id="pages" class="sidebar-dropdown list-unstyled collapse show"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class='sidebar-link' href='pages-profile.html'>Profile</a>
                            </li>
                            <li class="sidebar-item"><a class='sidebar-link' href='pages-settings.html'>Settings</a>
                            </li>
                            <li class="sidebar-item"><a class='sidebar-link' href='pages-clients.html'>Clients</a>
                            </li>
                            <li class="sidebar-item">
                                <a data-bs-target="#projects" data-bs-toggle="collapse" class="sidebar-link collapsed">
                                    Projects
                                </a>
                                <ul id="projects" class="sidebar-dropdown list-unstyled collapse ">
                                    <li class="sidebar-item">
                                        <a class='sidebar-link' href='pages-projects-list.html'>List</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class='sidebar-link' href='pages-projects-detail.html'>Detail <span
                                                class="badge badge-sidebar-primary">New</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item"><a class='sidebar-link' href='pages-invoice.html'>Invoice</a>
                            </li>
                            <li class="sidebar-item"><a class='sidebar-link' href='pages-pricing.html'>Pricing</a>
                            </li>
                            <li class="sidebar-item"><a class='sidebar-link' href='pages-tasks.html'>Tasks</a></li>
                            <li class="sidebar-item"><a class='sidebar-link' href='pages-chat.html'>Chat <span
                                        class="badge badge-sidebar-primary">New</span></a></li>
                            <li class="sidebar-item active"><a class='sidebar-link' href='pages-blank.html'>Blank
                                    Page</a></li>
                        </ul> --}}
                    </li>
                    <li class="sidebar-item">
                        <a class='sidebar-link' href="{{ url('/') }}">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Pengguna</span>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded-circle me-1"
                                    alt="Chris Wood" /> <span class="text-dark">Chris Wood</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class='dropdown-item' href='pages-profile.html'><i class="align-middle me-1"
                                        data-feather="user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                        data-feather="pie-chart"></i> Analytics</a>
                                <div class="dropdown-divider"></div>
                                <a class='dropdown-item' href='pages-settings.html'>Settings & Privacy</a>
                                <a class="dropdown-item" href="#">Help</a>
                                <a class="dropdown-item" href="#">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">

                    @yield('konten')

                </div>
            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">SIANTA | Single Management Data Of SMKNAA</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6 text-end">
                            <p class="mb-0">
                                &copy; 2024 - <a class='text-muted' href='index.html'>FreeCoding</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

</body>


<!-- Mirrored from appstack.bootlab.io/pages-blank by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Feb 2024 03:05:19 GMT -->

</html>
