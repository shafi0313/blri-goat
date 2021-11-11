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
            <h4 class="text-center">Please sign in</h4>
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
            <h6 style="border-bottom: 1px solid gray">Planing and Designing</h6>
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
                        <span>Nure Hasina Desha</span><br>
                        <span style="font-size: 14px">Goat & sheep production research division, BLRI, Savar,
                            Dhaka</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
