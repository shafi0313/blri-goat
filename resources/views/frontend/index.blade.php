@extends('frontend.layout.master')
@section('title')
@section('content')
@php $p='home'; @endphp
<div class="">
<!-- Slider Start -->
<section>
    <div class="row">
        <div class="col-md-8">
            <div class="owl-carousel owl-theme" id="owl_1">
                @foreach($sliders as $slider)
                    {{-- <div class="main_slider" style="background: url('{{ asset("files/images/slider/" .$slider->image) }}'); no-repeat; background-size: cover;min-height: 500px; width: 100%;"> --}}
                <div class="main_slider" style="background: url('{{ asset("files/images/slider/" .$slider->image) }}'); no-repeat; background-size: cover;min-height: 500px; width: 100%;">
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
        <div class="col-md-4">
            <br>
            <br>
            <h4 class="text-center">Please sign in</h4>
            <br>
            <form method="POST" action="{{ route('loginProcess') }}">
                @csrf
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Email</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user" style="padding:4px 0"></i></div>
                            </div>
                            <input type="email" name="email" value="admin@shafi95.com" required autofocus class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Password</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key" style="padding:4px 0"></i></div>
                            </div>
                            <input type="password" value="12345678" name="password" required autocomplete="current-password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="text-right m-2">
                        <a href="{{ route('forgetPassword') }}">Forget Password ?</a>
                    </div>

                    {{-- <div class="col-auto">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                            <label class="form-check-label" for="autoSizingCheck">
                                Remember me
                            </label>
                        </div>
                    </div> --}}
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block mb-2" style="width: 100%;">Sign In</button>
                    </div>
                    <h6 style="border-bottom: 1px solid gray">Planing and Designing</h6>
                    <div class="col-md-12">
                        <div style="width: 70px; height:50px; display: inline-block">
                            <img src="{{asset('files/images/user/head.jpg')}}" class="card-img-top" alt="...">
                        </div>
                        <div style="display: inline-block">Dr. Sadek Ahmed</div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>


    <div class="row">
        <div class="col-md-9">

            {{-- <section class="marque">
                <div class="">
                    <div class="">
                        <marquee onmouseover="stop()" onmouseout="start()">
                        <a href="#">Bangladesh Livestock Research Institute (BLRI)</a>
                        <span style="padding: 0px 15px;">|</span>
                        <a href="#">The institute was founded in 1984 in Savar Upazila, Dhaka division, Bangladesh. The executive head is the Director General and a 14-member Board of Management. The chairman is the Minister for Fisheries and Livestock. In 2014 it developed a new species of Layer chicken whose sex was discernable at day one of their life. It developed cattle feed from moringa tree and vegetable waste.</a>
                        </marquee>
                    </div>
                </div>
            </section> --}}

            <!-- About -->
            {{-- <section class="about" style="">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <h3 class="about_title">Welcome to <span>{{ $about->title}}</span></h3>
                            <p class="about_text">{!! \Illuminate\Support\Str::limit($about->texts, 310, ' ...') !!}</p>
                        </div>
                    </div>

                    <div class="row wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">
                        <div class="col-md-3 offset-5">
                            <a href="#">
                                <button class="btn btn-success btn-sm" style="width: 200px" type="button" data-toggle="modal" data-target="#exampleModal">More..</button>
                            </a>
                        </div>
                    </div> --}}

                    <!-- Modal -->
                    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Welcome to <strong>{{$about->title}}</strong>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-justify">{!! $about->texts !!}</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div> --}}

        {{-- <div class="col-md-3">
                <img src="{{asset('files/images/user/head.jpg')}}" class="card-img-top" alt="..." width="100px" height="100px">
                <div class="">
                    <p class="" style="font-size: 16px"><b>Dr. Sadek Ahmed</b></p>
                </div>
            </div>
        </div> --}}
    </div>
</div>

@endsection
