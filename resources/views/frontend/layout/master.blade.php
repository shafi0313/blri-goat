<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bangladesh Livestock Research Institute</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/css/bootstrap.min.css"
        integrity="sha512-o/MhoRPVLExxZjCFVBsm17Pkztkzmh7Dp8k7/3JrtNCHh0AQ489kwpfA3dPSHzKDe8YCuEhxXq3Y71eb/o6amg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--   <link rel="shortcut icon" type="image/x-icon" href=""> --><!-- img/favicon.ico -->
    <link rel="stylesheet" href="{{ asset('frontend/new/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/new/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/new/css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/new/css/responsive.css') }}">

</head>

<body>
    <!-- Header Start -->
    <section class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p><i class="fa fa-map-marker fa-iims"></i> Savar, Dhaka-1341, Bangladesh.</p>
                </div>
                <div class="col-md-6 text-end">
                    <p><i class="fa fa-envelope fa-iims"></i> info@gsms-blri.org</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Header End -->
    @php
        $homeMenu = '<a href="' . route('index') . '">Home</a>';
        $loginMenu = '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>';
        $blriMenu = '<a href="http://www.blri.gov.bd/" target="_blank">Bangladesh Livestock Research Institute</a>';
    @endphp
    <!--responsive menu area start-->
    <div class="offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>
                        <div class="welcome_text">
                            <ul>
                                <li>Goat & Sheep Research Digital Data Repository</li>
                                <li>Bangladesh Livestock Research Institute</li>
                                <li>Ministry of Fisheries & Livestock</li>
                            </ul>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    {!! $homeMenu !!}
                                </li>
                                <li class="menu-item-has-children ">
                                    <a href="#">Quick Links </a>
                                    <ul class="sub-menu">
                                        <li>{!! $blriMenu !!}</li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="#">About Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    {!! $loginMenu !!}
                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i>info@gsms-blri.org</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->

    <!--header area start-->
    <header class="header_area">
        <!--header middle start-->
        @include('frontend.layout.middle-header')
        <!--header middle end-->

        <!--header bottom start-->
        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="header_static text-center">
                            <div class="main_menu_inner m-auto">
                                <div class="main_menu">
                                    <nav>
                                        <ul>
                                            <li class="active">{!! $homeMenu !!}</li>
                                            <li><a href="">Quick Links <i class="fa fa-angle-down"></i></a>
                                                <ul class="sub_menu">
                                                    <li>{!! $blriMenu !!}</li>
                                                </ul>
                                            </li>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Contact</a></li>
                                            <li>
                                                {!! $loginMenu !!}
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header bottom end-->
    </header>
    <!--header area end-->

    <div class="container">
        <div style="width : 100%">
            <div style="float: left; margin-top: 17px;">
                <a href=""
                    style="padding: 13px 16px; margin: 19px 0px 16px 2px; background: #FF6A28; color: #fff;">Latest
                    Notice</a>
            </div>
            <marquee width="90%" direction="left" height="50px " scrollamount="5" onmouseover="this.stop();"
                onmouseout="this.start();">
                <p style="color: #11336D; font-size: 18px; padding: 15px;">
                    <a href="">asdf asdf sadf asdf sadf </a>
                </p>
            </marquee>
        </div>
    </div>
    @yield('content')
    {{-- <!--footer area start--> --}}
    @include('frontend.layout.footer')
    {{-- <!--footer area end--> --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.min.js"
        integrity="sha512-Hqe3s+yLpqaBbXM6VA0cnj/T56ii5YjNrMT9v+us11Q81L0wzUG0jEMNECtugqNu2Uq5MSttCg0p4KK0kCPVaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/new/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/new/js/main.js') }}"></script>


    {{-- <!-- Login Modal --> --}}
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 400px">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="loginModalLabel">Modal title</h5> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center mt-3">Please sign in</h3><br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="alert alert-{{ session('type') }}">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('loginProcess') }}">
                        @csrf
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInputGroup">Email</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user"
                                                style="padding:4px 0"></i>
                                        </div>
                                    </div>
                                    <input type="email" name="email" required autofocus class="form-control"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInputGroup">Password</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-key"
                                                style="padding:4px 0"></i>
                                        </div>
                                    </div>
                                    <input type="password" name="password" required autocomplete="current-password"
                                        class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div style="text-align: right" class="d-block mb-2">
                                <a style="text-decoration: none" href="{{ route('forgetPassword') }}">Forget
                                    Password?</a>
                            </div>
                            <br>

                            {{-- <div class="col-auto">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                        <label class="form-check-label" for="autoSizingCheck">
                            Remember me
                        </label>
                    </div>
                </div> --}}
                            <div class="row justify-content-center">
                                <div class="col-md-4 col-md-6">
                                    <button type="submit" class="btn btn-primary mb-2" style="width: 100%;">Sign
                                        In</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
