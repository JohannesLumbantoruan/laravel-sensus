<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('bs5/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/body.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/textfield.css') }}">

    <title>Login SI SENSUS</title>
</head>

<body>

    <div class="container-fluid">

        <!-- Card Login -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9 ">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">

                            <!-- cover -->
                            <div class="col-sm d-none d-lg-block position-relative">
                                <img src="{{ asset('assets/bg-cover.png')}}" class="position-absolute" width="100%" height="100%" class="cover">
                            </div>

                            <!-- form login -->
                            <div class="col-sm">
                                <form action="{{ route('loginAksi') }}" method="post">
                                @csrf
                                    <div class="row justify-content-center mt-5">

                                        <div class="col-lg-10 col-md-10">
                                            <h4 class="judul mx-3"><b>SENSUS</b></h4>
                                        </div>

                                        <div class="col-lg-10 col-md-10 mt-5">
                                            <h1 class="display-5 text-bold mx-3">LOGIN</h1>
                                            <p class="mx-3 judul">Selamat datang di <b>SENSUS</b></p>
                                        </div>

                                        <div class="col-lg-10 col-md-10 mt-3">
                                            <div class="group mx-3">
                                                <input type="text" name="username" value="{{ old('username') }}">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Username</label>
                                                <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                                            </div>

                                            <div class="group mx-3">
                                                <input type="password" name="password">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Password</label>
                                                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                                            </div>

                                        </div>

                                        <div class="col-lg-10 col-md-10 d-flex mt-4">
                                            <button type="submit" class="btn btn-red rounded shadow mb-4 mx-3"><i
                                                    class="fas fa-lock"></i> LOGIN</button>
                                        </div>

                                    </div>
                                </form>
                            </div>                       
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bs5/dist/js/bootstrap.bundle.js"></script>

</body>

</html>