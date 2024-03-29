@extends('layouts.master-without-nav')

@section('title')
    Login
@endsection

@section('css')
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.css') }}">
@endsection

@section('body')

    <body class="auth-body-bg" style="background-image: url('{{ URL::asset('/assets/images/simfoni-3.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center; ">
    @endsection

   

@section('title')
    @lang('translation.Login')
@endsection

@section('body')

    <body>
    @endsection

    @section('content')
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
            <div class="row d-flex justify-content-center mb-2">
                     <div class="col-md-3">
                        <img src="{{ URL::asset('/assets/images/logo02.png') }}" alt=""
                                            width="200">
                     </div>

            </div>
                <div class="row justify-content-center">

                
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-10">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Sign in to continue to {{ env('APP_NAME') }} Dashboard</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <!-- <img src="{{ URL::asset('/assets/images/profile-img.png') }}" alt=""
                                            class="img-fluid"> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="auth-logo">
                                    <!-- <a href="index" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ URL::asset('/assets/images/Logo08.png') }}" alt=""
                                                    class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a> -->
<!-- 
                                    <a href="index" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ URL::asset('/assets/images/logo08.png') }}" alt=""
                                                    class="rounded-circle" height="30">
                                            </span>
                                        </div>
                                    </a> -->
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input name="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="" id="username"
                                                placeholder="Enter Email" autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div
                                                class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                                <input type="password" name="password"
                                                    class="form-control  @error('password') is-invalid @enderror"
                                                    id="userpassword" value="" placeholder="Enter password"
                                                    aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                Remember me
                                            </label>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Log
                                                In</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            @if (Route::has('password.request'))
                                                <!-- <a href="{{ route('password.request') }}" class="text-muted"><i
                                                        class="mdi mdi-lock me-1"></i> Forgot your password?</a> -->
                                            @endif

                                        </div>
                                    </form>
                                </div>

                                <div class="text-center">

                                    <div>

                                    <p>Forgot Password ? <a href="{{ url('password/reset') }}" class="fw-medium text-primary">
                                                Reset My Password </a> </p>

                                        <p>© <script>
                                                document.write(new Date().getFullYear())

                                            </script> {{ env('APP_NAME') }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

    @endsection

    @section('script')
        <!-- owl.carousel js -->
        <script src="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
        <!-- auth-2-carousel init -->
        <script src="{{ URL::asset('/assets/js/pages/auth-2-carousel.init.js') }}"></script>
    @endsection
