<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Sianta</title>

    <link rel="canonical" href="pages-blank-2.html" />
    <link rel="shortcut icon" href="{{ asset('img/smk.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <!-- Choose your prefered color scheme -->
    <!-- <link href="css/light.css" rel="stylesheet"> -->
    <!-- <link href="css/dark.css" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <!-- Remove this after purchasing -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link class="js-stylesheet" href="{{ asset('css/light.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('parsleyjs/parsley.css') }}">
    <link rel="stylesheet" href="{{ asset('select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cropimage-master/cropimage.css') }}" />

    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }} ">
    <script src=" {{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('parsleyjs/parsley.js') }}"></script>
    <script src="{{ asset('parsleyjs/i18n/id.js') }}"></script>
    <script src="{{ asset('parsleyjs/i18n/id.extra.js') }}"></script>
    <script src="{{ asset('cropimage-master/cropimage.js') }} "></script>

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

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body>

    <body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
        <div class="main d-flex justify-content-center w-100">
            <main class="content d-flex p-0">
                <div class="container d-flex flex-column">
                    <div class="row h-100">
                        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                            <div class="d-table-cell align-middle">

                                <div class="text-center mt-4">
                                    <h1 class="h2">Welcome To SIANTA</h1>
                                    <p class="lead">
                                        Single Management Data Of SMKNAA
                                    </p>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="m-sm-3">
                                            <div class="d-grid gap-2 mb-3">

                                            </div>
                                            <form id="form_biasa" alamat="{{route('login_post')}}" rel="simpan"  method="post">
                                                    {{ csrf_field()}}
                                                <div class="mb-3">
                                                    <label class="form-label">Username</label>
                                                    <input class="form-control form-control-lg" type="text"
                                                        name="username" placeholder="Enter your username" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input class="form-control form-control-lg" type="password"
                                                        name="password" placeholder="Enter your password" />
                                                </div>
                                                <div class="d-grid gap-2 mt-3">
                                                    <button class='btn btn-lg btn-primary' type="submit">LogIn</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mb-3">
                                    &copy; Copyright 2024 - <a href=''>Free Coding</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            $(document).ready(function () {
                $("#form_biasa").on('submit', function (e) {
                    e.preventDefault();
                    var kem = $(this).attr("kem");
                    var url = $(this).attr("alamat");
                    var form = $(this);
                    var data = $(this).serialize();
                    var username=$("#username").val();
                    var password=$("#password").val();
                    if(username==""){
                        $("#username").focus();
                        swal("Username harus diisi");
                    }else if(password==""){
                        $("#password").focus();
                        swal("Password harus diisi")
                    }else{
                        $("#loading").css("display", "block");
                        $.ajax({
                        type: 'POST',
                        url: url,
                        data: data,
                        success: function (hasil) {
                            $("#loading").css("display", "none");
                            if (hasil == 1) {
                                swal.fire({
                                    title: 'Sucess',
                                    text: 'Login Berhasil',
                                    icon: 'success'
                                }).then(function() {
                                    window.location.href = "{{url('/dashboard')}}";
                                });
                            } else if (hasil == 2) {
                                swal.fire({
                                    title: 'Error',
                                    text: 'Login Gagal',
                                    icon: 'error'
                                }).then(function() {
                                });
                            } 
                        }
                    }); 
                    }
                    
                });
            });
        </script>
    </body>

</html>
