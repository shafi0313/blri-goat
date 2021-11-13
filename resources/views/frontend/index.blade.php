@extends('frontend.layout.master')
@section('title')
@section('content')
@php $p='home'; @endphp

<!-- Slider Start -->
<section class="container-flued">
    <div class="row p-0 m-0">
        <div class="col-md-8 p-0 m-0">
            <div class="owl-carousel owl-theme" id="owl_1">
                @foreach($sliders as $slider)
                <div class="main_slider"
                    style="background: url('{{ asset("files/images/slider/" .$slider->image) }}'); no-repeat; background-size: cover;min-height: 500px; width: 100%;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider_title">
                                    <h2 style="color:;">{{$slider->title}}</h2>
                                    <h3>{{$slider->sub_title}}</h3>
                                    @if($slider->link!='')
                                    <a href="{{$slider->link}}">{{$slider->link_name}}</a>
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-4 p-0 m-0 login">
            <br>
            <br>
            <br>
            <h4 class="text-center">Please sign in</h4>
            <br>
            <br>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session()->has('message'))
            <div class="alert alert-{{session('type')}}">
                {{session('message')}}
            </div>
            @endif
            <form method="POST" action="{{ route('loginProcess') }}">
                @csrf
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Email</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user" style="padding:4px 0"></i></div>
                            </div>
                            <input type="email" name="email" required autofocus class="form-control"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Password</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key" style="padding:4px 0"></i></div>
                            </div>
                            <input type="password" name="password" required autocomplete="current-password"
                                class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div style="text-align: right" class="d-block mb-2">
                        <a style="text-decoration: none" href="{{ route('forgetPassword') }}">Forget Password?</a>
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
                            <button type="submit" class="btn btn-primary mb-2" style="width: 100%;">Sign In</button>
                        </div>
                    </div>

                </div>
            </form>
            {{-- <h6 style="border-bottom: 1px solid gray">Planing and Designing</h6>
            <div class="row">
                <div class="col-md-2">
                    <div style="display: inline-block">
                        <img src="{{asset('files/images/user/head.jpg')}}" class="card-img-top" style="width:120%;height:120%">
                    </div>
                </div>
                <div class="col-md-10 pl-5">
                    <div style="display: inline-block; ">
                        <span>Dr. Sadek Ahmed</span><br>
                        <span style="font-size: 14px">Black bengal goat conservation & development project, BLRI, Savar,
                            Dhaka</span>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <div style="display: inline-block">
                        <img src="{{asset('files/images/user/head.jp')}}" class="card-img-top"
                            style="width:120%; height:120%">
                    </div>
                </div>
                <div class="col-md-10 pl-5">
                    <div style="display: inline-block; ">
                        <span>Nure Hasina Disha</span><br>
                        <span style="font-size: 14px">Goat & sheep production research division, BLRI, Savar,
                            Dhaka</span>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

</section>



<style>
    .section_title {
        text-align: center;
        font-size:25px
    }
    .team_area {
        padding: 60px 0;
        background: #cc8e35;
    }

    .outer-div,
    .inner-div {
      height: 400px;
      max-width: 300px;
      margin: -20 auto;
      position: relative;
    }

    .outer-div {
      perspective: 900px;
      perspective-origin: 50% calc(50% - 18em);
    }

    .inner-div {
      margin: 50px auto;
      border-radius: 5px;
      font-weight: 400;
      color: #071011;
      font-size: 1rem;
      text-align: center;
      transition: all 0.6s cubic-bezier(0.8, -0.4, 0.2, 1.7);
      transform-style: preserve-3d;
    }
    .inner-div:hover .social-icon {
      opacity: 1;
      top: 0;
    }
    .inner-div:hover .front__face-photo, .inner-div:hover .front__footer {
      opacity: 0;
    }

    .outer-div:hover .inner-div {
      transform: rotateY(180deg);
    }

    .front,
    .back {
      position: relative;
      top: 0;
      left: 0;
      -webkit-backface-visibility: hidden;
              backface-visibility: hidden;
    }

    .front {
      cursor: pointer;
      height: 100%;
      background: #fff;
      -webkit-backface-visibility: hidden;
              backface-visibility: hidden;
      border-radius: 5px;
      box-shadow: 0 15px 10px -10px rgba(0, 0, 0, 0.5), 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
    }

    .front__bkg-photo {
      position: relative;
      height: 150px;
      width: 100%;
      background: url("https://images.unsplash.com/photo-1511207538754-e8555f2bc187?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=88672068827eaeeab540f584b883cc66&auto=format&fit=crop&w=1164&q=80") no-repeat;
      background-size: cover;
      -webkit-backface-visibility: hidden;
              backface-visibility: hidden;
      overflow: hidden;
      border-top-right-radius: 5px;
      border-top-left-radius: 5px;
    }
    .front__bkg-photo:after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
    }

    .front__face-photo {
      position: relative;
      top: -60px;
      height: 120px;
      width: 120px;
      margin: 0 auto;
      border-radius: 50%;
      border: 5px solid #fff;
      background-size: contain;
      -webkit-backface-visibility: hidden;
              backface-visibility: hidden;
      overflow: hidden;
      transition: all 0.6s cubic-bezier(0.8, -0.4, 0.2, 1.7);
      z-index: 3;
    }

    .front__text {
      position: relative;
      top: -55px;
      margin: 0 auto;
      font-family: "Montserrat";
      font-size: 18px;
      -webkit-backface-visibility: hidden;
              backface-visibility: hidden;
    }
    .front__text .front__text-header {
      font-weight: 700;
      font-family: "Oswald";
      text-transform: uppercase;
      font-size: 20px;
    }
    .front__text .front__text-para {
      position: relative;
      top: -5px;
      color: #000;
      font-size: 14px;
      padding: 0 5px;
      /* letter-spacing: 0.4px; */
      /* font-weight: 400; */
      font-family: "Montserrat", sans-serif;
    }
    .front__text .front-icons {
      position: relative;
      top: 0;
      font-size: 14px;
      margin-right: 6px;
      color: gray;
    }
    .front__text .front__text-hover {
      position: relative;
      top: 10px;
      font-size: 10px;
      color: tomato;
      -webkit-backface-visibility: hidden;
              backface-visibility: hidden;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.4px;
      border: 2px solid tomato;
      padding: 8px 15px;
      border-radius: 30px;
      background: tomato;
      color: #fff;
    }

    .back {
      transform: rotateY(180deg);
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background-color: #071011;
      border-radius: 5px;
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
    }

    .social-media-wrapper {
      font-size: 36px;
    }
    .social-media-wrapper .social-icon {
      position: relative;
      top: 20px;
      margin-left: 5px;
      margin-right: 5px;
      opacity: 0;
      color: #fff;
      transition: all 0.4s cubic-bezier(0.3, 0.7, 0.1, 1.9);
    }
    .social-media-wrapper .social-icon:nth-child(1) {
      transition-delay: 0.6s;
    }
    .social-media-wrapper .social-icon:nth-child(2) {
      transition-delay: 0.7s;
    }
    .social-media-wrapper .social-icon:nth-child(3) {
      transition-delay: 0.8s;
    }
    .social-media-wrapper .social-icon:nth-child(4) {
      transition-delay: 0.9s;
    }

    .fab {
      position: relative;
      top: 0;
      left: 0;
      transition: all 200ms ease-in-out;
    }

    .fab:hover {
      top: -5px;
    }
</style>

    <section class="team_area">
        <div class="container">
            <div class="row ">
                <div class="col-md-6">
                    <div class="row">
                        <div class="section_title">Planing and Designing</div>
                        <div class="col-md-6">
                            <div class="outer-div">
                                <div class="inner-div">
                                    <div class="front">
                                        <div class="front__bkg-photo"></div>
                                        <div class="front__face-photo">
                                            <img src="{{asset('files/images/user/head.jpg')}}" alt="">
                                        </div>
                                        <div class="front__text">
                                            <h3 class="front__text-header">Dr. Sadek Ahmed</h3>
                                            <p class="front__text-para">Black bengal goat conservation & development project, BLRI, Savar,
                                                Dhaka</p>
                                            {{-- <p class="front__text-para">RTS, Lube Division</p> --}}

                                            <span class="front__text-hover">Hover to Find Me</span>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <div class="social-media-wrapper">
                                            <a href="#" class="social-icon"><i class="fab fa-facebook-square"></i></a>
                                            <a href="#" class="social-icon"><i class="fab fa-twitter-square"></i></a>
                                            <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="outer-div">
                                <div class="inner-div">
                                    <div class="front">
                                        <div class="front__bkg-photo"></div>
                                        <div class="front__face-photo">
                                            <img src="{{asset('files/images/user/disha.png')}}" alt="">
                                        </div>
                                        <div class="front__text">
                                            <h3 class="front__text-header">Nure Hasina Disha</h3>
                                            <p class="front__text-para">Goat & sheep production research division, BLRI, Savar,
                                                Dhaka</p>
                                            {{-- <p class="front__text-para">RTS, Lube Division</p> --}}

                                            <span class="front__text-hover">Hover to Find Me</span>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <div class="social-media-wrapper">
                                            <a href="#" class="social-icon"><i class="fab fa-facebook-square"></i></a>
                                            <a href="#" class="social-icon"><i class="fab fa-twitter-square"></i></a>
                                            <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
<style>
    .notice {
        min-height: 400px;
        margin-top: 48px;
        padding: 10px;
        height: 100%;
        background: #fff;
        border-radius: 4px;
    }
</style>

                <div class="col-md-5">
                    <div class="section_title">General Notices</div>
                    <div class="col-md-12">
                        <div class="notice">
                            <h3>Test test</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus voluptatum eveniet incidunt exercitationem maxime deleniti fugiat veniam fuga doloremque possimus, aliquam earum facere, sequi atque laboriosam eius! Dolor, aut aliquam?</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
