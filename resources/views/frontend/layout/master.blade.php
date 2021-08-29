<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | {{config('app.name')}}</title>
    <!--Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Meta Description Start-->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--Meta Decription End-->

    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <!--Favicon-->
    <link rel="icon" href="{{ asset('files/images/icon/fav_icon.png') }}" type="image/x-icon"/>

    <!-- Stylesheet-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
</head>
<body>
    <div class="container main_area">

    <!-- Nav Bar Start-->
    @include('frontend.layout.navigation')
    <!-- Nav Bar End-->

    <!-- PAGE CONTENT BEGINS -->
    @yield('content')

    <!-- Footer -->
            <!-- Footer Start -->
            <section class="footer">
                <div class="container">
                    {{-- <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="footer_image wow slideInLeft" data-wow-duration="2s" data-wow-delay="">
                                <img src="{{ asset('files/images/icon/f_logo.png') }}" alt="">
                            </div>
                            <div class="social">
                                <a href="#" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="#" target="_blank"><i
                                        class="fab fa-youtube"></i></a>
                                <a href="#" target="_blank"><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4 class="footer_title">Contact Us</h4>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 footer_icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="col-lg-10 col-md-10 address">
                                    12 kawranbazar, BDBL Bhaban,6th floor,Dhaka-1215,Bangladesh
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-2 footer_icon_2">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="col-lg-9 col-md-9 footer_icon_text">
                                    <a href="tel:01735833470">01735833470</a><br>
                                    <a href="tel:01723038913">01723038913</a>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-2 col-md-2 footer_icon_2">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="col-lg-10 col-md-10 footer_icon_text">
                                    <a href="mailto:contact@lg-communityservices.com" class="link_">contact@nexim.com</a><br>
                                    <a href="mailto:info@lg-communityservices.com">info@nexim.com</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-2 footer_icon_3">
                                    <i class="fas fa-globe-americas"></i>
                                </div>
                                <div class="col-lg-10 col-md-10">
                                    <p><a href="#">www.nexim.com</a></p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <h4 class="footer_title">Our Services</h4>
                            <ul class="footer_link">
                                <li><a href="#">Web Dsign & Development</a></li>
                                <li><a href="#">UI/UX Design</a></li>
                                <li><a href="#">Graphic Design</a></li>
                                <li><a href="#">SEO</a></li>
                                <li><a href="#">WordPress</a></li>
                                <li><a href="#">Content Writing</a></li>
                            </ul>
                        </div>

                        <div class="col-md-2">
                            <h4 class="footer_title">Quick Links</h4>
                            <ul class="footer_link">
                                <li><a href="">Services</a></li>
                                <li><a href="{{ url('about') }}">About Us</a></li>
                                <li><a href="{{ route('allProducts')}}">privacy &amp; policy</a></li>
                                <li><a href="">Contact Us</a></li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </section>
            <!-- Footer End -->

            <!-- Footer Copyright Start -->
            <section class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="copy">BLRI &copy; {{date('Y')}} All Rights Reserved &nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp; Powered  by <a href="https://www.lsccom.com/">LS COMMUNICATIONS</a><span></span></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Back to top button -->
            <a id="button"><i class="fas fa-chevron-up"></i></a>

            {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script> --}}
            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

            <script src="{{ asset('frontend/js/popper.js') }}"></script>
            <script src="{{ asset('frontend/js/jquery3.4.1.js') }}"></script>
            <!-- <script src="js/jquery-3.3.1.js"></script> -->
            <script src="{{ asset('frontend/vendor/owlcarousel/js/owl.carousel.min.js') }}"></script>
            <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
            {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> --}}
            <script src="{{ asset('frontend/vendor/wowjs/wow.min.js') }}"></script>
            <script src="{{ asset('frontend/js/main.js') }}"></script>
            <script src="{{ asset('frontend/js/wow.min.js') }}"></script>

            <script src="{{ asset('frontend/vendor/sweetalert/sweetalert2.all.min.js')}}"></script>

            <script>
                new WOW().init();
            </script>
    </div>
        </body>
      </html>

</body>
</html>
