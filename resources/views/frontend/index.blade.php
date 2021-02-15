<!DOCTYPE html>
<html>


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <!-- Basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Digilab Medical Services Ltd.</title>

  <meta name="keywords" content="Digilab Medical Services Ltd." />
  <meta name="description" content="PDigilab Medical Services Ltd.">
  <meta name="author" content="roopokar.com">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('public/porto/img/favicon.ico') }}" type="image/x-icon" />
  <link rel="apple-touch-icon" href="{{ asset('public/porto/img/apple-touch-icon.png') }}">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

  <!-- Web Fonts  -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/vendor/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/vendor/animate/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/vendor/owl.carousel/assets/owl  .theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/vendor/magnific-popup/magnific-popup.min.css') }}">



  <!-- Theme CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/css/theme.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/css/theme-elements.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/css/theme-blog.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/css/theme-shop.css') }}">

  <!-- Current Page CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/vendor/rs-plugin/css/settings.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/vendor/rs-plugin/css/layers.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/vendor/rs-plugin/css/navigation.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/vendor/circle-flip-slideshow/css/component.css') }}">

  <!-- Demo CSS -->


  <!-- Skin CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/css/skins/default.css') }}">

  <!-- Theme Custom CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/public/porto/css/custom.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/public/css/jquery-confirm.min.css') }}">

  <!-- Head Libs -->
  <script src="{{ asset('frontend/public/porto/vendor/modernizr/modernizr.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('frontend/frontend/public/porto/datatables/dataTables.bootstrap4.css') }}">

  <link rel="stylesheet" href="{{ asset('frontend/public/css/chosen.css') }}">
  <style>
    #header .header-column .header-extra-info li .header-extra-info-text label {
      color: #00984a;
      font-weight: bold;
    }

    @media only screen and (max-width: 500px) {

      .box1,
      .box2,
      .box3 {
        display: none !important;
      }

      .footmobile {
        text-align: center;

      }

      #sticky {
        display: none !important;
      }
    }

    @media screen and (max-width: 768px) and (min-width: 500px) {

      .sticky-icon .fa-phone-square,
      .sticky-icon .fa-user-md,
      .sticky-icon .fa-money-bill-alt {
        display: block !important;
      }

      .sbox1,
      .box2,
      .box3,
      .serach,
      .fa-phone-square,
      .fa-user-md,
      .fa-money-bill-alt {
        display: none !important;
      }

      .smobile b {
        font-size: 15px !important;
        text-align: center !important;
        float: none !important;
      }

      .btnmobile {
        margin-left: 0px !important;
      }

      .footmobile {
        text-align: center;

      }
    }

    #sticky {
      position: fixed;
      top: 500;
      z-index: 10000;
      right: 0px;
    }

    .sticky-icon {
      background-color: #055D0F !important;
      padding: 10px 5px;
      margin-bottom: 2px;
      font-size: 30px;
      color: white;
      border: 1px solid white;
      text-align: center;
    }

    .sticky-icon a {
      color: white;
    }
  </style>
  <style>
    .flash-button {
      background: #00984a;
      padding: 5px 10px;
      color: #ffffff;
      border: none;
      border-radius: 5px;

      animation-name: flash;
      animation-duration: 1s;
      animation-timing-function: linear;
      animation-iteration-count: infinite;

      //Firefox 1+
      -webkit-animation-name: flash;
      -webkit-animation-duration: 1s;
      -webkit-animation-timing-function: linear;
      -webkit-animation-iteration-count: infinite;

      //Safari 3-4
      -moz-animation-name: flash;
      -moz-animation-duration: 1s;
      -moz-animation-timing-function: linear;
      -moz-animation-iteration-count: infinite;
    }

    @keyframes flash {
      0% {
        opacity: 1.0;
      }

      50% {
        opacity: 0.5;
      }

      100% {
        opacity: 1.0;
      }
    }

    //Firefox 1+
    @-webkit-keyframes flash {
      0% {
        opacity: 1.0;
      }

      50% {
        opacity: 0.5;
      }

      100% {
        opacity: 1.0;
      }
    }

    //Safari 3-4
    @-moz-keyframes flash {
      0% {
        opacity: 1.0;
      }

      50% {
        opacity: 0.5;
      }

      100% {
        opacity: 1.0;
      }
    }
  </style>

  <style>
    @media only screen and (max-width: 500px) {

      .smobile {
        padding-top: 100px !Important;
      }

      .btnmobile {
        margin-left: 0px !Important;
      }

      .servicemobile,
      .docmobile {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
      }

      .knowmobile {
        margin-top: 0px !important;
      }

      .footmobile {
        border-top: 1px solid white !important;
        padding-top: 15px !important;
      }

      .popdesc,
      .happytext,
      .advtext {
        display: none !important;
      }

      .techslider {
        margin-top: -60px !important;
      }

      .docdiv {
        text-align: center;
      }

      .bestdiv {
        line-height: 25px !important;
        font-size: 20px !important;
      }

    }

    .testimonial {
      background-color: white;
      padding: 30px 0px;
      margin-right: 10px;
    }

    .boxbtn {
      padding: 30px !important;
      height: 90px;
      border-radius: 0px;
      width: 100%;
    }

    html .btn-primary:active,
    html .btn-primary.active {
      background-color: #0b9e53 !important;
    }

    .doclist {
      text-align: center;
      font-size: 12px;
      line-height: 18px;
    }

    html .scroll-to-top {
      margin-bottom: 32px;
    }

    #header .header-nav-features {

      padding-left: 0px;
      margin-left: 0px;
    }
  </style>

  <!--Start of Zendesk Chat Script-->
  <script type="text/javascript">

  </script>
  <!--End of Zendesk Chat Script-->
</head>

<body>

  <div class="body">
    <style>
      .fb_dialog {
        right: 45pt !important;
      }
    </style>
    <style>
      .example1 {
        height: 50px;
        overflow: hidden;
        position: relative;
      }

      .example1 h3 {
        font-size: 13px;
        font-weight: 600;
        color: #00984a;
        position: relative;
        width: max-content;
        height: 100%;
        margin: 0;
        text-align: center;
        line-height: 45px;
        /* Starting position */
        -moz-transform: translateX(100%);
        -webkit-transform: translateX(100%);
        transform: translateX(100%);
        /* Apply animation to this element */
        -moz-animation: example1 30s linear infinite;
        -webkit-animation: example1 30s linear infinite;
        animation: example1 30s linear infinite;
      }

      /* Move it (define the animation) */
      @-moz-keyframes example1 {
        0% {
          -moz-transform: translateX(100%);
        }

        100% {
          -moz-transform: translateX(-100%);
        }
      }

      @-webkit-keyframes example1 {
        0% {
          -webkit-transform: translateX(100%);
        }

        100% {
          -webkit-transform: translateX(-100%);
        }
      }

      @keyframes example1 {
        0% {
          -moz-transform: translateX(100%);
          /* Firefox bug fix */
          -webkit-transform: translateX(100%);
          /* Firefox bug fix */
          transform: translateX(100%);
        }

        100% {
          -moz-transform: translateX(-100%);
          /* Firefox bug fix */
          -webkit-transform: translateX(-100%);
          /* Firefox bug fix */
          transform: translateX(-100%);
        }
      }

      .blink_text {

        animation: 1s blinker linear infinite;
        -webkit-animation: 1s blinker linear infinite;
        -moz-animation: 1s blinker linear infinite;
        font-weight: bold;
        color: red;
        line-height: 20px;
        text-align: center;
        font-size: 13px;
        margin-right: 5px;
      }

      .blink_text_blue {

        animation: 1s blinker linear infinite;
        -webkit-animation: 1s blinker linear infinite;
        -moz-animation: 1s blinker linear infinite;
        font-weight: bold;
        color: #006fba;
        line-height: 20px;
        text-align: center;
        font-size: 13px;

      }

      @-moz-keyframes blinker {
        0% {
          opacity: 1.0;
        }

        50% {
          opacity: 0.0;
        }

        100% {
          opacity: 1.0;
        }
      }

      @-webkit-keyframes blinker {
        0% {
          opacity: 1.0;
        }

        50% {
          opacity: 0.0;
        }

        100% {
          opacity: 1.0;
        }
      }

      @keyframes blinker {
        0% {
          opacity: 1.0;
        }

        50% {
          opacity: 0.0;
        }

        100% {
          opacity: 1.0;
        }
      }

      @media only screen and (max-width: 600px) {
        .blink_text {
          line-height: 15px;
          text-align: center;
          padding-top: 5px;
          margin-right: 5px;
        }

        .blink_text_blue {
          line-height: 15px;
          text-align: center;
          padding-top: 5px;
        }

        #header .header-top {
          height: 90px !important;
        }
      }
    </style>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml: true,
          version: 'v3.2'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = '../connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="196298460417225" theme_color="#00984a">
    </div>
    <header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 108, 'stickySetTop': '-172px', 'stickyChangeLogo': true}">
      <div class="header-body border-color-primary border-top-0 box-shadow-none">
        <div class="header-top" style="height: 60px;border-bottom: 1px solid rgba(0, 0, 0, 0.06);">
          <div class="container">
            <div class="header-row py-2">
              <div class="header-column justify-content-start" style="width:80%">
                  <div class="content" style="overflow: hidden;width: 100%;">
                    <div class="">
                      <marquee onmouseover="stop()" onmouseout="start()">
                        <a href="#">Fully Computerised & Digital Diagnostic Centre .</a>
                        <span style='padding: 0px 25px;'>|</span>
                        <a href="#">Government of Bangladesh recommended our diagnostic centre for testing #COVID-19 for the passengers who will travel abroad.</a>
                        <span style='padding: 0px 25px;'>|</span>
                        <a href="#">FREE DIABETIC CARE CENTRE</a>
                        <span style='padding: 0px 25px;'>|</span>
                        <a href="#">FREE Out-Door Patient Services for Poor Patient</a>
                        <span style='padding: 0px 25px;'>|</span>
                        <a href="#">Welcome to Digilab Medical Services Ltd.</a>
                      </marquee>
                    </div>
                  </div>
                </div>

              <div class="header-column justify-content-end">
                <div class="header-row">
                    <ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean">
                      <li class="social-icons-facebook"><a href="#" target="_blank" title="Facebook"><i class="fab fa-facebook-f" style="color: "></i></a></li>
                      <li class="social-icons-youtube"><a href="#" target="_blank" title="Youtube"><i class="fab fa-youtube" style="color:"></i></a></li>
                      <li class="social-icons-linkedin"><a href="#" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in" style="color: "></i></a></li>
                      <li class="social-icons-instagram"><a href="#" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header-container container z-index-2 d-none d-lg-block">
          <div class="header-row">
            <div class="header-column">
              <div class="header-row">
                <div class="res d-none d-lg-block">
                  <div class="header-logo header-logo-sticky-change">
                    <a href="index.html">
                      <img class="header-logo-sticky opacity-0" alt="Porto" width="55" height="auto" data-sticky-width="40" data-sticky-height="auto" data-sticky-top="93" src="public/porto/img/logo.png">
                      <img class="header-logo-non-sticky opacity-0" alt="Porto" width="80" height="auto" src="public/porto/img/logo.png">
                    </a>
                  </div>
                </div>
              </div>
            </div>


            <div class="header-column justify-content-end">
              <div class="header-row h-100">
                <ul class="header-extra-info d-flex h-100 align-items-center">
                  <li class="align-items-center h-100 py-4 box1">
                    <div class="header-extra-info-text h-100 py-2">
                      <div class="feature-box feature-box-style-2 align-items-center">
                        <div class="feature-box-icon">
                          <i class="fab fa-whatsapp text-7 p-relative"></i>
                        </div>
                        <div class="feature-box-info pl-1">
                          <label>Hotline (Dhanmondi)</label>
                          <strong>
                            <a href="tel:09613787801">09613 787801</a>
                            <!--<br>-->
                            <!--<a href="tel:09666787801">09666 787801</a>-->
                          </strong>
                         <!--  <a href="call-for-appointment.html#hotlines" style='font-size:10px;font-weight:600;'>Other Branches >></a> -->
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="align-items-center h-100 py-4 box2">
                    <div class="header-extra-info-text h-100 py-2">
                      <div class="feature-box feature-box-style-2 align-items-center">
                        <div class="feature-box-icon">
                          <i class="far fa-clock text-7 p-relative"></i>
                        </div>
                        <div class="feature-box-info pl-1">
                          <label>Working Hour</label>
                          <strong>7 AM - 11 PM (Everyday)</strong>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="align-items-center h-100 py-4 pr-4 d-none d-md-inline-flex box3">
                    <div class="header-extra-info-text h-100 py-2">
                      <div class="feature-box feature-box-style-2 align-items-center">
                        <div class="feature-box-icon">
                          <i class="far fa-envelope text-7 p-relative"></i>
                        </div>
                        <div class="feature-box-info pl-1">
                          <label>Email Us</label>
                          <strong><a href="mailto:chairman_digilab@digilab.com.bd">chairman_digilab@digilab.com.bd</a></strong>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="align-items-center h-100 py-4">
                    <div class="header-extra-info-text h-100 py-2">
                      <div class="feature-box feature-box-style-2 align-items-center">

                      <!--   <div class="feature-box-info pl-1">
                          <button type="button" class="btn btn-modern btn-success btn-xl rounded-0 mb-2 flash-button" onclick="PatientPortal()" style="display:none;">PATIENT PORTAL</button>
                          <a href="http://43.240.103.190/" target="_blank" class="btn btn-modern btn-success btn-xl rounded-0 mb-2 flash-button">PATIENT PORTAL</a>
                        </div> -->
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="header-nav-bar bg-primary" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'background-color': 'transparent'}" data-sticky-header-style-deactive="{'background-color': '#0088cc'}">
          <div class="container">
            <div class="header-row">
              <div class="header-column">
                <div class="header-row">

                  <div class="res d-lg-none">
                    <div class="">
                      <a href="index.html">
                        <img class="" alt="Porto" width="55" height="auto" data-sticky-width="40" data-sticky-height="auto" data-sticky-top="93" src="{{ asset('frontend/public/porto/img/logo.png') }}">
                      </a>
                    </div>
                  </div>


                  <div class="header-colum order-2 order-lg-1">
                    <div class="header-row">
                      <div class="header-nav header-nav-stripe header-nav-divisor header-nav-force-light-text justify-content-start" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'margin-left': '88px'}"
                        data-sticky-header-style-deactive="{'margin-left': '0'}">
                        <div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                          <nav class="collapse">
                            <ul class="nav nav-pills" id="mainNav">
                              <li class="dropdown dropdown-full-color dropdown-light">
                                <a class="dropdown-item  active " href="index.html"> Home </a>
                              </li>
                              <li class="dropdown dropdown-full-color dropdown-light">
                                <a class="dropdown-item dropdown-toggle " href="#"> ABOUT US <i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                  <li>
                                    <a class="dropdown-item" href="goals-and-objectives.html"> Goal & Objectives </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="chairman-message.html"> Message From Chairman </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="md-message.html"> Message From Managing Director </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="management-team.html"> Management Team </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="dropdown dropdown-full-color dropdown-light">
                                <a class="dropdown-item dropdown-toggle " href="#"> OUR SERVICES <i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                  <li>
                                    <a class="dropdown-item" href="our-services.html#1&Imaging"> Imaging </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="our-services.html#2&Pathology"> Pathology </a>
                                  </li>

                                  <li>
                                    <a class="dropdown-item" href="our-services.html#pharmacy"> Pharmacy </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="our-price-list.html">Test and Service Charges </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="package.html">Health Packages </a>
                                  </li>
                                </ul>
                              </li>

                              <li class="dropdown dropdown-full-color dropdown-light">
                                <a class="dropdown-item " href="find-doctors.html">DOCTORS </a>
                              </li>

                              <li class="dropdown dropdown-full-color dropdown-light dropdown-mega">
                                <a class="dropdown-item  dropdown-toggle" href="#">BRANCHES</a>
                                <ul class="dropdown-menu">
                                  <li>
                                    <div class="dropdown-mega-content">
                                      <div class="row">



                                        <div class="col-lg-2">
                                          <span class="dropdown-mega-sub-title text-success" style="margin-top:10px">
                                            DHAKA
                                          </span>
                                          <hr style="margin:0px;width:130%;border-top:1px solid #ccc">
                                          <ul class="dropdown-mega-sub-nav">
                                            <li><a class="dropdown-item" href="#">DHANMONDI</a></li>
                                            <li><a class="dropdown-item" href="our-branches/2/English-road.html">ENGLISH ROAD</a></li>
                                            <li><a class="dropdown-item" href="our-branches/3/Shantinagar-(U-1).html">SHANTINAGAR (U-1)</a></li>
                                            <li><a class="dropdown-item" href="our-branches/4/Shantinagar-(U-2).html">SHANTINAGAR (U-2)</a></li>
                                            <li><a class="dropdown-item" href="our-branches/5/Narayangonj.html">NARAYANGONJ</a></li>
                                            <li><a class="dropdown-item" href="our-branches/6/Savar.html">SAVAR</a></li>
                                            <li><a class="dropdown-item" href="our-branches/7/Uttara-(U-1).html">UTTARA (U-1)</a></li>
                                          </ul>
                                        </div>
                                        <div class="col-lg-2">
                                          <span class="dropdown-mega-sub-title text-success" style="margin-top:10px">
                                            &nbsp;
                                          </span>
                                          <hr style="margin:0px;border-top:1px solid #ccc">
                                          <ul class="dropdown-mega-sub-nav">
                                            <li><a class="dropdown-item" href="our-branches/8/Uttara-(U-2).html">UTTARA (U-2)</a></li>
                                            <li><a class="dropdown-item" href="our-branches/9/Shyamoli.html">SHYAMOLI</a></li>
                                            <li><a class="dropdown-item" href="our-branches/10/Mirpur-(U-1).html">MIRPUR (U-1)</a></li>
                                            <li><a class="dropdown-item" href="our-branches/11/Mirpur-(U-2).html">MIRPUR (U-2)</a></li>
                                            <li><a class="dropdown-item" href="our-branches/18/Badda.html">BADDA</a></li>
                                            <li><a class="dropdown-item" href="our-branches/27/Gazipur.html">GAZIPUR</a></li>
                                          </ul>
                                        </div>



                                        <div class="col-lg-2">
                                          <span class="dropdown-mega-sub-title text-success" style="margin-top:10px">
                                            CHITTAGONG
                                          </span>
                                          <hr style="margin:0px;border-top:1px solid #ccc">
                                          <ul class="dropdown-mega-sub-nav">
                                            <li><a class="dropdown-item" href="our-branches/29/Noakhali.html">NOAKHALI</a></li>
                                            <li><a class="dropdown-item" href="our-branches/16/Chittagong.html">CHITTAGONG</a></li>
                                          </ul>
                                        </div>



                                        <div class="col-lg-2">
                                          <span class="dropdown-mega-sub-title text-success" style="margin-top:10px">
                                            RAJSHAHI
                                          </span>
                                          <hr style="margin:0px;border-top:1px solid #ccc">
                                          <ul class="dropdown-mega-sub-nav">
                                            <li><a class="dropdown-item" href="our-branches/28/Rajshahi.html">RAJSHAHI</a></li>
                                          </ul>
                                        </div>



                                        <div class="col-lg-2">
                                          <span class="dropdown-mega-sub-title text-success" style="margin-top:10px">
                                            RANGPUR
                                          </span>
                                          <hr style="margin:0px;border-top:1px solid #ccc">
                                          <ul class="dropdown-mega-sub-nav">
                                            <li><a class="dropdown-item" href="our-branches/15/Rangpur-(U-1).html">RANGPUR (U-1)</a></li>
                                            <li><a class="dropdown-item" href="our-branches/25/Rangpur-(U-2).html">RANGPUR (U-2)</a></li>
                                            <li><a class="dropdown-item" href="our-branches/19/Dinajpur.html">DINAJPUR</a></li>
                                            <li><a class="dropdown-item" href="our-branches/32/Kurigram.html">KURIGRAM</a></li>
                                          </ul>
                                        </div>



                                        <div class="col-lg-2">
                                          <span class="dropdown-mega-sub-title text-success" style="margin-top:10px">
                                            MYMENSINGH
                                          </span>
                                          <hr style="margin:0px;border-top:1px solid #ccc">
                                          <ul class="dropdown-mega-sub-nav">
                                            <li><a class="dropdown-item" href="our-branches/26/Mymensingh.html">MYMENSINGH</a></li>
                                          </ul>
                                        </div>



                                        <div class="col-lg-2">
                                          <span class="dropdown-mega-sub-title text-success" style="margin-top:10px">
                                            BOGRA
                                          </span>
                                          <hr style="margin:0px;border-top:1px solid #ccc">
                                          <ul class="dropdown-mega-sub-nav">
                                            <li><a class="dropdown-item" href="our-branches/12/Bogra-(U-1).html">BOGRA (U-1)</a></li>
                                            <li><a class="dropdown-item" href="our-branches/13/Bogra-(U-2).html">BOGRA (U-2)</a></li>
                                            <li><a class="dropdown-item" href="our-branches/14/Bogra-(U-3).html">BOGRA (U-3)</a></li>
                                          </ul>
                                        </div>






                                        <div class="col-lg-2">
                                          <span class="dropdown-mega-sub-title text-success" style="margin-top:10px">
                                            KHULNA
                                          </span>
                                          <hr style="margin:0px;border-top:1px solid #ccc">
                                          <ul class="dropdown-mega-sub-nav">
                                            <li><a class="dropdown-item" href="our-branches/30/Kushtia.html">KUSHTIA</a></li>
                                          </ul>
                                        </div>



                                        <div class="col-lg-2">
                                          <span class="dropdown-mega-sub-title text-success" style="margin-top:10px">
                                            BARISHAL
                                          </span>
                                          <hr style="margin:0px;border-top:1px solid #ccc">
                                          <ul class="dropdown-mega-sub-nav">
                                            <li><a class="dropdown-item" href="our-branches/31/Barishal.html">BARISHAL</a></li>
                                          </ul>
                                        </div>



                                        <div class="col-lg-2">
                                          <span class="dropdown-mega-sub-title text-success" style="margin-top:10px;cursor:pointer" onclick="window.open('our-branches.html','_parent')">
                                            View All Branches
                                          </span>
                                          <!--<hr style="margin:0px;border-top:1px solid #ccc">-->
                                        </div>
                                        <div class="col-lg-4">

                                        </div>
                                        <div class="col-lg-4">
                                          <span class="dropdown-mega-sub-title text-success" style="margin-top:10px;cursor:pointer" onclick="window.open('map.html','_parent')">
                                            PDCL All Branches Location in Google Map
                                          </span>
                                          <ul class="dropdown-mega-sub-nav">
                                            <li>
                                              <a href="map.html">
                                                <img class="img-fluid" src="{{ asset('frontend/public/map.jpg') }}" />
                                              </a>
                                            </li>
                                          </ul>
                                        </div>

                                      </div>
                                    </div>
                                  </li>
                                </ul>
                              </li>

                              <li class="dropdown dropdown-full-color dropdown-light">
                                <a class="dropdown-item " href="our-gallery.html"> GALLERY </a>
                              </li>

                              <li class="dropdown dropdown-full-color dropdown-light">
                                <a class="dropdown-item dropdown-toggle " href="blog-and-news.html"> NEWS & MEDIA <i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                  <li>
                                    <a class="dropdown-item" href="our-news-and-notices.html"> News & Notices </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="our-events.html"> Events </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="our-blogs.html">Blogs </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="corporate-videos.html">Corporate Videos </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="dropdown dropdown-full-color dropdown-light">
                                <a class="dropdown-item " href="career-announcement.html"> CAREER </a>
                              </li>
                              <li class="dropdown dropdown-full-color dropdown-light">
                                <a class="dropdown-item " href="contact-us.html"> CONTACT </a>
                              </li>

                            </ul>
                          </nav>
                        </div>
                        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                          <i class="fas fa-bars"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="header-column order-1 order-lg-2">
                    <div class="header-row justify-content-end">
                      <div class="header-nav-features header-nav-features-no-border w-75 w-auto-mobile d-none d-sm-flex">
                        <form role="search" id="search_form" class="d-flex w-100 serach" action="#" method="post" onsubmit="return false;">
                          <input type="hidden" name="_token" value="0EE56F2rjbLI8C1qqCQSwuA7pGsf2zweFwWsVdb3">
                          <div class="simple-search input-group w-100">
                            <input class="form-control border-0" id="headerSearch" name="search_text" type="search" value="" placeholder="Search..." onkeyup="searching()">
                            <ul class="list-group" id="search_result" style="margin: 37px 0px 15px 15px;padding: 0px;border:none;position: absolute;width: 250px;height: 400px;overflow-y: auto;overflow-x: hidden;display: none;">
                            </ul>
                            <span class="input-group-append bg-light border-0">
                              <button class="btn" type="button" onclick="searching()">
                                <i class="fa fa-search header-nav-top-icon"></i>
                              </button>
                            </span>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div id="sticky" style="display: none;margin-top: 150px">
      <div class="sticky-icon"><a href="call-for-appointment.html" title="Call for Appointment"><i class="fas fa-phone-square ml-1"></i></a></div>
      <div class="sticky-icon"><a href="find-doctors.html" title="Find a Doctor"><i class="far fas fa-user-md ml-1"></i></a></div>
      <div class="sticky-icon"><a href="our-price-list.html" title="Test and Service Charges"><i class="fas fa-money-bill-alt ml-1"></i></a></div>
    </div>
    <style>
      .owl-carousel.corporate .owl-item img {
        width: 150px !important;
      }

      .testimonial.testimonial-with-quotes blockquote p {
        padding: 0 5px;
      }

      .testimonial.testimonial-style-2 blockquote {
        padding: 05px 20px;
      }
    </style>
    <div role="main" class="main">
      <div class="slider-container light rev_slider_wrapper" style="height: 425px;">
        <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider
          data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 425, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'navigation' : {'arrows': { 'enable': true, 'style': 'arrows-style-1 arrows-big arrows-dark' }, 'bullets': {'enable': false, 'style': 'bullets-style-1 bullets-color-primary', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
          <ul>
            <li data-transition="fade">
              <img src="{{ asset('frontend/public/porto/img/slides/slide04.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

              <div class="tp-caption" data-x="['left','left','center','center']" data-hoffset="['145','145','-150','-240']" data-y="center" data-voffset="['-125','-125','-125','-75']" data-start="1000" data-transform_in="x:[-300%];opacity:0;s:500;"
                data-transform_idle="opacity:0.5;s:500;"></div>

              <div class="tp-caption text-color-light font-weight-normal happytext" data-x="['left','left','center','center']" data-hoffset="['155','155','0','0']" data-y="center" data-voffset="['-125','-125','-125','-75']" data-start="700"
                data-fontsize="['18','18','18','40']" data-lineheight="['25','25','25','45']" data-transform_in="y:[-50%];opacity:0;s:500;">Happy to see you healthy</div>


              <div class="tp-caption" data-x="['left','left','center','center']" data-hoffset="['440','440','150','240']" data-y="center" data-voffset="['-125','-125','-125','-75']" data-start="1000" data-transform_in="x:[300%];opacity:0;s:500;"
                data-transform_idle="opacity:0.5;s:500;"></div>

              <h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2 bestdiv"
                data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                data-x="['left','left','center','center']" data-hoffset="['152','152','0','0']" data-y="center" data-voffset="['-50','-50','-50','-75']" data-fontsize="['35','35','35','90']" data-lineheight="['40','40','40','95']"
                data-letterspacing="-1"> A Well equipped<br> Cutting-edge <br></h1>

              <div class="tp-caption font-weight-light text-color-light advtext"
                data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                data-x="['left','left','center','center']" data-hoffset="['155','155','0','0']" data-y="center" data-voffset="['20','20','20','80']" data-fontsize="['18','18','18','50']" data-lineheight="['20','20','20','55']">and most advanced
                diagnostic center is always with you</div>

              <a class="tp-caption btn btn-primary font-weight-bold" href="our-gallery.html"
                data-frames='[{"delay":3000,"speed":2000,"frame":"0","from":"y:50%;opacity:0;","to":"y:0;o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                data-x="['left','left','center','center']" data-hoffset="['155','155','0','0']" data-y="center" data-voffset="['80','80','80','80']" data-fontsize="['13','13','13','25']" data-lineheight="['20','20','20','25']">Learn More <i
                  class="fas fa-arrow-right ml-1"></i></a>
            </li>
            <li data-transition="fade">
              <img src="{{ asset('frontend/public/porto/img/slides/slide01.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" techslider data-bgrepeat="no-repeat" class="rev-slidebg">

              <div class="tp-caption" data-x="['left','left','center','center']" data-hoffset="['145','145','-150','-240']" data-y="center" data-voffset="['-125','-125','-125','-75']" data-start="1000" data-transform_in="x:[-300%];opacity:0;s:500;"
                data-transform_idle="opacity:0.5;s:500;"></div>

              <div class="tp-caption text-color-dark font-weight-normal happytext" data-x="['left','left','center','center']" data-hoffset="['155','155','0','0']" data-y="center" data-voffset="['-125','-125','-125','-75']" data-start="700"
                data-fontsize="['18','18','18','40']" data-lineheight="['25','25','25','45']" data-transform_in="y:[-50%];opacity:0;s:500;">Happy to see you healthy</div>


              <div class="tp-caption" data-x="['left','left','center','center']" data-hoffset="['440','440','150','240']" data-y="center" data-voffset="['-125','-125','-125','-75']" data-start="1000" data-transform_in="x:[300%];opacity:0;s:500;"
                data-transform_idle="opacity:0.5;s:500;"></div>

              <h1 class="tp-caption font-weight-extra-bold text-color-dark negative-ls-2 bestdiv"
                data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                data-x="['left','left','center','center']" data-hoffset="['152','152','0','0']" data-y="center" data-voffset="['-50','-50','-50','-75']" data-fontsize="['35','35','35','90']" data-lineheight="['40','40','40','95']"
                data-letterspacing="-1">The trusted and <br>friendly medical professionals</h1>

              <div class="tp-caption font-weight-light text-color-dark advtext"
                data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                data-x="['left','left','center','center']" data-hoffset="['155','155','0','0']" data-y="center" data-voffset="['20','20','20','80']" data-fontsize="['18','18','18','50']" data-lineheight="['20','20','20','55']">for every patient of
                all branches over the country</div>

              <a class="tp-caption btn btn-primary font-weight-bold" href="our-branches.html"
                data-frames='[{"delay":3000,"speed":2000,"frame":"0","from":"y:50%;opacity:0;","to":"y:0;o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                data-x="['left','left','center','center']" data-hoffset="['155','155','0','0']" data-y="center" data-voffset="['80','80','80','80']" data-fontsize="['13','13','13','25']" data-lineheight="['20','20','20','25']">Learn More <i
                  class="fas fa-arrow-right ml-1"></i></a>

            </li>
            <li data-transition="fade">
              <img src="{{ asset('frontend/public/porto/img/slides/slide02.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

              <div class="tp-caption" data-x="['left','left','center','center']" data-hoffset="['145','145','-150','-240']" data-y="center" data-voffset="['-125','-125','-125','-75']" data-start="1000" data-transform_in="x:[-300%];opacity:0;s:500;"
                data-transform_idle="opacity:0.5;s:500;"></div>

              <div class="tp-caption text-color-light font-weight-normal happytext" data-x="['left','left','center','center']" data-hoffset="['155','155','0','0']" data-y="center" data-voffset="['-125','-125','-125','-75']" data-start="700"
                data-fontsize="['18','18','18','40']" data-lineheight="['25','25','25','45']" data-transform_in="y:[-50%];opacity:0;s:500;">Happy to see you healthy</div>


              <div class="tp-caption" data-x="['left','left','center','center']" data-hoffset="['440','440','150','240']" data-y="center" data-voffset="['-125','-125','-125','-75']" data-start="1000" data-transform_in="x:[300%];opacity:0;s:500;"
                data-transform_idle="opacity:0.5;s:500;"></div>

              <h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2 bestdiv"
                data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                data-x="['left','left','center','center']" data-hoffset="['152','152','0','0']" data-y="center" data-voffset="['-50','-50','-50','-75']" data-fontsize="['35','35','35','90']" data-lineheight="['40','40','40','95']"
                data-letterspacing="-1">High quality, Appropriate <br>and Accessible medical care</h1>

              <div class="tp-caption font-weight-light text-color-light advtext"
                data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                data-x="['left','left','center','center']" data-hoffset="['155','155','0','0']" data-y="center" data-voffset="['20','20','20','80']" data-fontsize="['18','18','18','50']" data-lineheight="['20','20','20','55']">We aim to deliver for
                all of our patients</div>

              <a class="tp-caption btn btn-primary font-weight-bold" href="our-services.html"
                data-frames='[{"delay":3000,"speed":2000,"frame":"0","from":"y:50%;opacity:0;","to":"y:0;o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                data-x="['left','left','center','center']" data-hoffset="['155','155','0','0']" data-y="center" data-voffset="['80','80','80','80']" data-fontsize="['13','13','13','25']" data-lineheight="['20','20','20','25']">Learn More <i
                  class="fas fa-arrow-right ml-1"></i></a>

            </li>
            <li data-transition="fade">
              <img src="{{ asset('frontend/public/porto/img/slides/slide03.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" techslider data-bgrepeat="no-repeat" class="rev-slidebg">

              <div class="tp-caption" data-x="['left','left','center','center']" data-hoffset="['145','145','-150','-240']" data-y="center" data-voffset="['-125','-125','-125','-75']" data-start="1000" data-transform_in="x:[-300%];opacity:0;s:500;"
                data-transform_idle="opacity:0.5;s:500;"></div>

              <div class="tp-caption text-color-dark font-weight-normal happytext" data-x="['left','left','center','center']" data-hoffset="['155','155','0','0']" data-y="center" data-voffset="['-125','-125','-125','-75']" data-start="700"
                data-fontsize="['18','18','18','35']" data-lineheight="['25','25','25','45']" data-transform_in="y:[-50%];opacity:0;s:500;">Happy to see you healthy</div>


              <div class="tp-caption" data-x="['left','left','center','center']" data-hoffset="['440','440','150','240']" data-y="center" data-voffset="['-125','-125','-125','-75']" data-start="1000" data-transform_in="x:[300%];opacity:0;s:500;"
                data-transform_idle="opacity:0.5;s:500;"></div>

              <h1 class="tp-caption font-weight-extra-bold text-color-dark negative-ls-2 bestdiv"
                data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                data-x="['left','left','center','center']" data-hoffset="['152','152','0','0']" data-y="center" data-voffset="['-50','-50','-50','-75']" data-fontsize="['40','40','40','90']" data-lineheight="['40','40','40','95']"
                data-letterspacing="-1">The art of our medical service<br> amuses the patient </h1>

              <div class="tp-caption font-weight-light text-color-dark advtext"
                data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                data-x="['left','left','center','center']" data-hoffset="['155','155','0','0']" data-y="center" data-voffset="['20','20','20','80']" data-fontsize="['18','18','18','50']" data-lineheight="['20','20','20','55']">while our technology
                identifies the disease sharply</div>

              <a class="tp-caption btn btn-primary font-weight-bold" href="find-doctors.html"
                data-frames='[{"delay":3000,"speed":2000,"frame":"0","from":"y:50%;opacity:0;","to":"y:0;o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                data-x="['left','left','center','center']" data-hoffset="['155','155','0','0']" data-y="center" data-voffset="['80','80','80','80']" data-fontsize="['13','13','13','25']" data-lineheight="['20','20','20','25']">Learn More <i
                  class="fas fa-arrow-right ml-1"></i></a>

            </li>
          </ul>
        </div>
      </div>

      <section class="section bg-color-light border-0 m-0 smobile" style="padding:0px;">
        <div class="container" style="margin-top: -65px;">
          <div class="row text-center text-md-left mt-4">
            <div class="col-md-3 mb-4 mb-md-0 appear-animation animated fadeInLeftShorter appear-animation-visible" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200" style="text-align: center; animation-delay: 200ms;">
              <a href="call-for-appointment.html" class="btn btn-primary btn-xl mb-2 boxbtn"><b style="
					    float: left; font-size:20px; line-height: 20px;
					">Call for<br> Appointment</b> <i class="fas fa-phone-square ml-1" style="
					    float: right; font-size: 30px;
					"></i> </a>
            </div>

            <div class="col-md-3 mb-4 mb-md-0 appear-animation animated fadeInLeftShorter appear-animation-visible" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200" style="text-align: center; animation-delay: 200ms;">
              <a href="find-doctors.html" class="btn btn-primary btn-xl mb-2 boxbtn"><b style="
					    float: left;  font-size:20px;
					">Find a Doctor</b> <i class="fas fa-user-md ml-1" style="
					    float: right; font-size: 30px;
					"></i> </a>
            </div>

            <div class="col-md-3 mb-4 mb-md-0 appear-animation animated fadeInLeftShorter appear-animation-visible" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200" style="text-align: center; animation-delay: 200ms;">
              <a href="our-price-list.html" class="btn btn-primary btn-xl mb-2 boxbtn"><b style="
					    float: left;  font-size:18px;line-height: 20px;
					">Test and Service<br> Charges</b> <i class="fas fa-money-bill-alt ml-1" style="
					    float: right; font-size: 30px;
					"></i> </a>
            </div>

            <div class="col-md-3 mb-4 mb-md-0 appear-animation animated fadeInLeftShorter appear-animation-visible" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200" style="text-align: center; animation-delay: 200ms;">
              <a href="package.html" class="btn btn-primary btn-xl mb-2 boxbtn"><b style="
					    float: left;  font-size:18px;
					">Health Packages</b> <i class="fas fa-list ml-1" style="
					    float: right; font-size: 30px;
					"></i> </a>
            </div>
          </div>
        </div>
      </section>

      <div class="container">
        <div class="row my-5 servicemobile">
          <div class="col-md-6 order-1 order-md-2 text-center text-md-left mb-5 mb-md-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
            <h2 class="text-color-dark font-weight-normal text-6 mb-2">Our<strong class="font-weight-extra-bold"  style="color: #055D0F;"> Services</strong></h2>
            <p><b>We are committed to provide affordable services, without any compromise on the quality of service – so
                that you are able to remain happy.</b></p>

            <p style="color: #055D0F;">
              <i class="fa fa-microscope fa-2x"></i>
              <span style='font-size: 18px;font-weight: bold;padding-left: 20px;'>Imaging</span>
              <div>
                <p>Digilab Medical Services Ltd. is an advanced Centre&nbsp;providing the diagnostic imaging services in an elevated ambience, completed by service and report efficiency.</p>
              </div>
              <a href="our-services.html#1&Imaging" class="read-more">read more <i class="fas fa-angle-right"></i></a>
            </p>
            <p style="color: #055D0F;">
              <i class="fa fa-diagnoses fa-2x"></i>
              <span style='font-size: 18px;font-weight: bold;padding-left: 20px;'>Pathology</span>
              <div>
                <p>Our Pathology division offers a comprehensive range of laboratory tests for diagnosis, management and prevention of a wide variety of diseases.</p>
              </div>
              <a href="our-services.html#2&Pathology" class="read-more">read more <i class="fas fa-angle-right"></i></a>
            </p>

          </div>

          <div class="col-md-6 order-1 order-md-2 text-center text-md-left mb-5 mb-md-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
            <h2 class="text-color-dark font-weight-normal text-6 mb-2">Important<strong class="font-weight-extra-bold"  style="color: #055D0F;"> Notices</strong></h2>
            <div>
              <ul class="simple-post-list">
                <li>
                  <div class="post-image">
                    <div class="img-thumbnail d-block">
                      <a href="blog-and-news/3.html">
                        <img src="{{ asset('frontend/public/branch.jpg') }}" style="max-width:75px;">
                      </a>
                    </div>
                  </div>
                  <div class="post-info" style="display: grid;">
                    <a href="blog-and-news/3.html">ICT for Chikungunya IgG/IgM</a>
                    <p>
                      <div style="max-height: 50px;overflow: hidden">
                        <p>A new pathological test &#39;ICT for&nbsp;<strong>Chikungunya IgG/IgM</strong>&#39;. Disease symptoms are very similar to Dengue Fever. No preparation is required. Report will be delivered on the same day of specimen
                          collection.</p>
                      </div>

                      <b> Feb 09 , 2019</b>
                    </p>
                  </div>
                </li>
              </ul>
            </div>
            <div style="margin-top:05px;">
              <button class="btn btn-primary btn-xl mb-2" onclick="CallForAmbulance()" style="padding: 29px; height: 90px; border-radius: 0px; width: auto; text-align: left;">
                <b style="float: right; padding-left: 20px; font-size: 15px;">Call for <br> Ambulance</b>
                <i class="fa fa-ambulance" style="float: left; font-size: 40px;"></i>
              </button>

              <a href="our-branches.html" class="btn btn-primary btn-xl mb-2 border-0 btnmobile" style="margin-left: 20px;padding: 25px 45px; height: 90px; border-radius: 0px; width: auto; text-align: left;">
                <b style="float: right; padding-left: 20px; font-size: 15px;">Our <br> Branches</b>
                <i class="fa fa-building" style="float: left; font-size: 40px;"></i>
              </a>
            </div>

          </div>
        </div>
      </div>
      <div class="home-intro bg-primary" id="home-intro">
        <div class="container">

          <div class="row align-items-center">
            <div class="col-lg-8 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
              <p>
                WE CARE YOUR HEALTH AND CHECKUP WITH BEST <span class="highlighted-word">Technology</span>
                <span>Digilab Medical Services Ltd. has a collection of the most advanced medical technologies. All the
                  machineries which are being used here are designed with rigorous safety standards to aid in the
                  diagnosis or treatment of medical problems.</span>
              </p>
            </div>
            <div class="col-lg-4">
              <div class="get-started text-left text-lg-left">
                <a href="goals-and-objectives.html" class="btn btn-dark btn-lg text-3 font-weight-semibold px-4 py-3" style="color: green; background-color: white;">Know more Details</a>

              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="container">
        <div class="row my-5 docmobile">
          <div class="col-md-6 order-1 order-md-2 text-center text-md-left mb-5 mb-md-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
            <h2 class="text-color-dark font-weight-normal text-6 mb-2">Meet Our<strong class="font-weight-extra-bold"  style="color: #055D0F;"> Doctors</strong></h2>
            <p class="lead">We have talent, experienced, reputed and dynamic doctors in our team working in a growing practice.
              All the doctors are whole heartedly waiting to help out the patients with majestic treatments. Our
              doctors are supported by practice nurses, management and clerical staff all providing high quality care
              to our patients.</p>
            <a href="find-doctors.html" class="btn btn-modern btn-rounded btn-success mb-2">All Doctors</a>
            <a href="todays-doctors.html" class="btn btn-modern btn-rounded btn-success mb-2">Today's Doctors</a>
          </div>

          <div class="col-md-6">

            <div class="row">

              <div class="owl-carousel owl-theme" data-plugin-options="{'responsive': {'0': {'items': 2}, '410': {'items': 2}, '768': {'items': 2}, '979': {'items': 3}, '1199': {'items': 3}}, 'loop': false, 'autoHeight': true, 'margin': 10}">
                <div>
                  <a href="doctor-profile/170/Prof.-Dr.-Md.html">
                    <img class="img-fluid" src="{{ asset('frontend/public/doctor/doctor (1).jpg') }}" style="height: 180px">
                    <p class="font-weight-bold doclist">Prof. Dr. Md. Monimul Hoque</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Child/Pediatric</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/1187/DR.-K.html">
                    <img class="img-fluid" src="{{ asset('frontend/public/doctor/doctor (2).jpg') }}" style="height: 180px">
                    <p class="font-weight-bold doclist">DR. K.M AHASAN AHMED CHANCHAL</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Medicine</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/157/Prof.-Dr.-Md.html">
                    <img class="img-fluid" src="{{ asset('frontend/public/doctor/doctor (3).jpg') }}" style="height: 180px">
                    <p class="font-weight-bold doclist">Prof. Dr. Md. Anowarul Islam</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Orthopaedic Surgery</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/598/Dr.-Md.html">
                    <img class="img-fluid" src="{{ asset('frontend/public/doctor/doctor (4).jpg') }}" style="height: 180px">
                    <p class="font-weight-bold doclist">Dr. Md. Pervez Amin</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Neurology</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/156/Prof.-Dr.html">
                    <img class="img-fluid" src="{{ asset('frontend/public/doctor/doctor (5).jpg') }}" style="height: 180px">
                    <p class="font-weight-bold doclist">Prof. Dr. Moinuddin Ahmed Chowdhury</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Orthopaedic Surgery</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/797/Dr.html">
                    <img class="img-fluid" src="public/doctor/doctor (6).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">Dr. Dulal Chandra Das</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Liver Medicine/Hepatology</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/1190/Dr.html">
                    <img class="img-fluid" src="public/doctor/doctor (7).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">Dr. Sharmin Sultana Shefa</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Gynaecology</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/1186/ASST.-PROF.-DR.html">
                    <img class="img-fluid" src="public/doctor/doctor (8).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">ASST. PROF. DR. FARHANA RAHMAN</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Child Paediatrics</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/149/Prof.-Dr.html">
                    <img class="img-fluid" src="public/doctor/doctor (9).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">Prof. Dr. M A Azhar</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Medicine</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/1185/Asso.Prof.-Dr.-Md.html">
                    <img class="img-fluid" src="public/doctor/doctor (10).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">Asso.Prof. Dr. Md. Jamir Uddin</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Child Paediatrics</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/1196/DR.-A.S.M.html">
                    <img class="img-fluid" src="public/doctor/doctor (11).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">DR. A.S.M. MUSA KOBIR</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Medicine</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/1191/Asst.Prof.Dr.-Md.html">
                    <img class="img-fluid" src="public/doctor/doctor (12).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">Asst.Prof.Dr. Md. Sirajum Munir</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Cardiology</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/725/Prof.html">
                    <img class="img-fluid" src="public/doctor/doctor (13).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">Prof. Ferdousi Islam (Lipi)</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Gynaecology</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/1188/ASST.-PROF.-DR.-MD.html">
                    <img class="img-fluid" src="public/doctor/doctor (14).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">ASST. PROF. DR. MD. NASIMUL BARI (BAPPI)</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Cardiology</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/1195/Asst.-Prof.-Dr.-A.T.html">
                    <img class="img-fluid" src="public/doctor/doctor (15).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">Asst. Prof. Dr. A.T.M Ataur Rahman (Hiron)</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Gastroenterology</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/1189/Asst.Prof.Dr.-Md.html">
                    <img class="img-fluid" src="public/doctor/doctor (16).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">Asst.Prof.Dr. Md. Emamul Haque</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">ENT, Head &amp; Neck Surgery</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/179/Prof.-Dr.-Md.html">
                    <img class="img-fluid" src="public/doctor/doctor (17).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">Prof. Dr. Md. Abu Jafor</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Paediatrics Surgery</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/1182/ASSO.-PROF.-DR.-MD.html">
                    <img class="img-fluid" src="public/doctor/doctor (18).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">ASSO. PROF. DR. MD. ZAHID RAIHAN</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Neurosurgery</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/622/Dr.html">
                    <img class="img-fluid" src="public/doctor/doctor (19).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">Dr. Rajashish Chakrabortty</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Chest Medicine</p>
                  </a>
                </div>
                <div>
                  <a href="doctor-profile/216/Prof.-Dr.html">
                    <img class="img-fluid" src="public/doctor/doctor (20).jpg" style="height: 180px">
                    <p class="font-weight-bold doclist">Prof. Dr. Faruque Ahmed</p>
                    <p class="doclist" style="padding: 0px;margin-top:-15px;">Gastroenterology</p>
                  </a>
                </div>

              </div>


            </div>

          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-3 order-1 order-md-2 text-center text-md-left mb-5 mb-md-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
            <h3 style="border-right: 2px solid lightgrey;">Our Latest<br> <strong class="font-weight-extra-bold" style="color: #055D0F; line-height: 35px;">Technology</strong></h3>
          </div>
          <div class="col-md-9 order-1 order-md-2 text-center text-md-left mb-5 mb-md-0 appear-animation popdesc" style="margin-top: -10px;" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
            <p>At Digilab Medical Services Ltd. We have been actively revamping our technologies with the most
              modern one since the first day of our journey. All the aged machineries are being regularly replaced with
              the latest one. Technical team members are maintaining the machineries actively so that these can
              provide the best outcome.</p>
          </div>
        </div>

      </div>

      <div class="owl-carousel owl-theme full-width techslider" data-plugin-options="{'items': 4, 'loop': false, 'nav': true, 'dots': false}">
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="{{ asset('frontend/public/media/37-2019020216300.jpg') }}" class="img-fluid" alt="<p>no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="{{ asset('frontend/public/media/38-2019020216300.jpg') }}" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="{{ asset('frontend/public/media/39-2019020216300.jpg') }}" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="{{ asset('frontend/public/media/40-2019020216300.jpg') }}" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="{{ asset('frontend/public/media/41-2019020216300.jpg') }}" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="{{ asset('frontend/public/media/42-2019020216300.jpg') }}" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/43-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/44-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/45-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/46-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/47-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/48-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/49-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/50-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/51-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/52-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/53-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/54-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/55-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/56-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/57-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/58-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/59-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/60-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/61-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
        <div>
          <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
            <span class="thumb-info-wrapper">
              <img src="public/media/62-2019020216300.jpg" class="img-fluid" alt="no image" style="height: 300px; border-right:1px solid white;">
            </span>
          </span>
        </div>
      </div>

      <section class="section bg-color-grey-scale-1 border-0 m-0">
        <div class="container pb-2">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="text-center">Testmonials</h2>
              <div class="owl-carousel owl-theme nav-style-1 stage-margin"
                data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 2}, '1200': {'items': 2}}, 'loop': true, 'nav': true, 'dots': false, 'stagePadding': 40}">

                <div>
                  <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark testimonial-remove-right-quote pl-md-4 mb-0">
                    <div class="testimonial-author">
                      <img src="{{ asset('frontend/public/testimonial/1-20190319155227.jpg') }}" class="img-fluid mb-0" style="max-width: 200px; height: auto; width: 175px;">
                    </div>
                    <blockquote>
                      <p class="text-4 line-height-5 mb-0">
                        <div>
                          <p>A complete, advanced and friendly diagnostic and medical services provider in Bangladesh. Their qualified workforce and quality equipment give best result for any treatment like an international service.&nbsp;</p>
                        </div>
                      </p>
                    </blockquote>
                    <div class="testimonial-author">
                      <p><strong class="font-weight-extra-bold text-2">Mr. Ahmed</strong><span>Biman Bangladesh</span></p>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark testimonial-remove-right-quote pl-md-4 mb-0">
                    <div class="testimonial-author">
                      <img src="{{ asset('frontend/public/testimonial/2-20190319153146.jpg') }}" class="img-fluid mb-0" style="max-width: 200px; height: auto; width: 175px;">
                    </div>
                    <blockquote>
                      <p class="text-4 line-height-5 mb-0">
                        <div>
                          <p>Digilab Medical Services Ltd. provides&nbsp;best diagnostic and medical services. They have most advanced medical equipment to diagnosis any type of diseases. I am so satisfied for their customer support.</p>
                        </div>
                      </p>
                    </blockquote>
                    <div class="testimonial-author">
                      <p><strong class="font-weight-extra-bold text-2">Mr. Hasan</strong><span>Brac Bank</span></p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section border-0 m-0" style="background-color:white; margin-bottom: -65px !important;">
        <div class="container pb-2">
          <h2 class="text-center" style="padding-bottom: 20px; text-align:center;">Corporate Partners</h2>
          <div class="row">

            <div class="owl-carousel owl-theme corporate" data-plugin-options="{'responsive': {'0': {'items': 2}, '410': {'items': 2}, '768': {'items': 3}, '992': {'items': 5}, '1200': {'items': 5}}, 'autoplay': true, 'autoplayTimeout': 3000}">
              <div>
                <img class="img-fluid" src="{{ asset('frontend/public/partner/12-20190206171012.jpg') }}">
              </div>
              <div>
                <img class="img-fluid" src="{{ asset('frontend/public/partner/14-20190206171019.png') }}">
              </div>
              <div>
                <img class="img-fluid" src="{{ asset('frontend/public/partner/18-20190206170755.jpg') }}">
              </div>
              <div>
                <img class="img-fluid" src="{{ asset('frontend/public/partner/23-20190206170848.jpg') }}">
              </div>
              <div>
                <img class="img-fluid" src="{{ asset('frontend/public/partner/24-20190206171030.jpg') }}">
              </div>
              <div>
                <img class="img-fluid" src="{{ asset('frontend/public/partner/28-20190206171046.jpg') }}">
              </div>
              <div>
                <img class="img-fluid" src="{{ asset('frontend/public/partner/51-20190206171134.jpg') }}">
              </div>
              <div>
                <img class="img-fluid" src="{{ asset('frontend/public/partner/67-20190206171113.jpg') }}">
              </div>
              <div>
                <img class="img-fluid" src="{{ asset('frontend/public/partner/78-20190206171155.jpg') }}">
              </div>
              <div>
                <img class="img-fluid" src="{{ asset('frontend/public/partner/123-20190206171212.jp') }}g">
              </div>
              <div>
                <img class="img-fluid" src="public/partner/180-20190206170947.jpg">
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section border-0 m-0" style="background-color:white; margin-bottom: -65px !important;">
        <div class="container pb-2">
          <h2 class="text-center" style="padding-bottom: 20px; text-align:center;">Service Partners</h2>
          <div class="row">
            <div class="col-lg-4" style="text-align:center;">
              <img class="img-fluid" style="max-width:250px;" src="public/partner/AmarlabLogo.png">

            </div>
            <div class="col-lg-4" style="text-align:center;">
              <img class="img-fluid" style="max-width:250px;" src="public/partner/sheba.png">

            </div>
            <div class="col-lg-4" style="text-align:center;">
              <img class="img-fluid" style="max-width:250px;" src="public/partner/tonic.png">

            </div>

          </div>
        </div>
      </section>
    </div>

    <style>
      #footer a:not(.btn) {
        color: white;
      }
    </style>

    <footer id="footer" class="border-0" style="background: url('public/porto/img/footer-back-1.jpg'); background-size:cover; background-position: 0 100%;
    box-shadow: inset 0 0 0 215px rgba(0, 0, 0, 0.48);">
      <div class="container">
        <div class="row justify-content-md-center py-5 mt-3">


          <div class="col-md-4 col-lg-4 text-center text-lg-left mb-5 mb-lg-0">
            <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Important Links</h5>
            <ul class="list list-unstyled">
              <li class="mb-1"><a href="#" target='_blank' class="link-hover-style-1">Digilab Medical Services Ltd. Pharmaceuticals</a></li>
              <li class="mb-1"><a href="#" target='_blank' class="link-hover-style-1">Digilab Medical Services Ltd. Medical College</a></li>
              <li class="mb-1"><a href="#" target='_blank' class="link-hover-style-1">Digilab Medical Services Ltd. Medical College Hospital</a></li>
              <li class="mb-1"><a href="management-team.html" class="link-hover-style-1">Management Team</a></li>
              <li class="mb-1"><a href="career-announcement.html" class="link-hover-style-1">Career</a></li>
            </ul>

          </div>
          <div class="col-md-4 col-lg-4 text-center text-lg-left mb-5 mb-lg-0">
            <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Quick Links</h5>
            <ul class="list list-unstyled">
              <li class="mb-1"><a href="our-services.html" class="link-hover-style-1">Our Services</a></li>
              <li class="mb-1"><a href="our-branches.html" class="link-hover-style-1">Our Branches</a></li>
              <li class="mb-1"><a href="call-for-appointment.html" class="link-hover-style-1">Call for Appointments</a></li>
              <li class="mb-1"><a href="find-doctors.html" class="link-hover-style-1">Find Docotrs</a></li>
              <li class="mb-1"><a href="our-gallery.html" class="link-hover-style-1">Gallery</a></li>
              <li class="mb-1"><a href="sitemap.html" class="link-hover-style-1">Sitemap</a></li>
            </ul>
          </div>

          <div class="col-md-4 col-lg-4 text-center text-lg-left mb-5 mb-lg-0">
            <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Contact Us</h5>
            <p style="color:white;">
              House #02, Road#06, Block#A, Section#10, Mirpur, Dhaka, Bangladesh
              <br>
              Phone: 9025283, 9023812, 01678-092703, 01856996664<br>
              E-mail : chairman_digilab@digilab.com.bd<br>
            </p>
            <ul class="social-icons">
              <li class="social-icons-facebook"><a href="#" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
              <li class="social-icons-youtube"><a href="#" target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a></li>
              <li class="social-icons-linkedin"><a href="#" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
              <li class="social-icons-twitter"><a href="#" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
              <li class="social-icons-instagram"><a href="#" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>

        </div>
      </div>
      <div class="footer-copyright footer-copyright-style-2 background-transparent footer-top-light-border footmobile">
        <div class="container" style="padding-bottom: 1.5rem!important;">
          <div class="row">

            <div class="col-lg-4">
              <p style="color:white;">© Copyright 2019. Digilab Medical Services Ltd.</p>
            </div>
            <div class="col-lg-5">
              <nav id="sub-menu">
                <ul>
                  <li><a href="#">Terms and Conditions</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="our-gallery/3.html">Customer Support</a></li>
                </ul>
              </nav>
            </div>
            <div class="col-lg-3">
              <p style="color:white;"><strong>3018288</strong> Total Views</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <!-- Vendor -->
  <script src="{{ asset('frontend/public/porto/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('frontend/public/js/jquery-confirm.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/popper/umd/popper.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/common/common.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/isotope/jquery.isotope.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/vide/jquery.vide.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/vivus/vivus.min.js') }}"></script>

  <!-- Theme Base, Components and Settings -->
  <script src="{{ asset('frontend/public/porto/js/theme.js') }}"></script>

  <!-- Current Page Vendor and Views -->
  <script src="{{ asset('frontend/public/porto/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
  <script src="{{ asset('frontend/public/porto/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

  <!-- Current Page Vendor and Views -->
  <script src="{{ asset('frontend/public/porto/js/views/view.contact.html') }}"></script>

  <!-- Theme Custom -->
  <script src="{{ asset('frontend/public/porto/js/custom.js') }}"></script>

  <!-- Theme Initialization Files -->
  <script src="{{ asset('frontend/public/porto/js/theme.init.js') }}"></script>

  <script src="{{ asset('frontend/public/js/chosen.jquery.js" type="text/javascript') }}"></script>

  <script type="text/javascript">
    $('.chosen').chosen();
  </script>

  <script type="text/javascript">
    $(window).scroll(function() {
      var height = $(window).scrollTop();

      if (height > 500) {

        $("#sticky").fadeIn();
      } else {
        $("#sticky").fadeOut();
      }
    });
  </script>


  <script type="text/javascript">
    $(document).ready(function() {
      $('table.data_view_table').DataTable();
      $('input[type=text]').attr('autocomplete', 'off');
      $('input[type=number]').attr('autocomplete', 'off');
    });
    $('input[type=text]').attr('autocomplete', 'off');
    $('input[type=number]').attr('autocomplete', 'off');

    function CallForAmbulance() {
      $.dialog({
        title: '',
        content: '<center><h4 class="text-success">Ambulance Service</h4><hr style="margin-top:5px"><i class="fa fa-ambulance fa-5x text-color-primary"></i><br><br><a class="text-primary font-weight-bold text-6" href="tel:+8809613787801"><i class="fa fa-phone-square"></i> +8809613787801</a></center><hr style="margin-bottom:0px">',
        animation: 'scale',
        columnClass: 'small',
        closeAnimation: 'top',
        backgroundDismiss: true,
      });
    }

    function PatientPortal() {
      $.dialog({
        title: '',
        content: '<center><hr><p><h4 class="alert" style="color:#155724">Patient Portal section is under construction. </h4></p><hr><center>',
        animation: 'scale',
        columnClass: 'col-md-4 col-md-offset-2',
        closeAnimation: 'top',
        backgroundDismiss: true,
      });
    }

    function ServiceDetails(ser_id) {
      $.dialog({
        title: '',
        content: "url:http://digilab.com.bd/newdesign/" + ser_id,
        animation: 'scale',
        columnClass: 'medium',
        closeAnimation: 'top',
        backgroundDismiss: true,
      });
    }

    function searching() {
      var text = $('#headerSearch').val();
      if (text != '') {
        var data = $('#search_form').serializeArray();
        $.ajax({
          url: "http://digilab.com.bd/newdesign/",
          type: 'POST',
          data: data,
          success: function(data) {
            if (data != "") {
              $('#search_result').html(data).show();
            } else {
              $('#search_result').html('').hide();
            }
          }
        });
      } else {
        $('#search_result').html('').hide();
      }
    }

    function searchPrice() {
      var text = $('#price_text').val();
      if (text != '') {
        var data = $('#price_form').serializeArray();
        $.ajax({
          url: "http://digilab.com.bd/newdesign/",
          type: 'POST',
          data: data,
          success: function(response) {
            if (response.success) {
              var content = '';
              $.each(response.priceList, function(index, val) {
                content += '<tr><td>' + (index + 1) + '</td><td>' + val["pl_name"].toUpperCase().replace(text.toUpperCase(), '<strong class="text-green">' + text.toUpperCase() + '</strong>', val["pl_name"].toUpperCase()) +
                  '</td><td class="text-right"><strong class="text-info">' + (val["pl_price"]) + '</strong><strong> BDT</strong></td></tr>';
              });
              $('#search_body').html(content);
              $('#search_row').show();
            } else {
              $('#search_body').html('');
              $('#search_row').hide();
            }
          }
        });
      } else {
        $('#search_body').html('');
        $('#search_row').hide();
      }
    }

    function clearPriceResult() {
      $('#search_body').html('');
      $('#search_row').hide();
    }
  </script>

</body>



</html>