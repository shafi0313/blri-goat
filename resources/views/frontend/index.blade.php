@extends('frontend.layout.master')
@section('title')
@section('content')
@php $p='home'; @endphp
<div class="">
<!-- Slider Start -->
<section>
    <div class="owl-carousel owl-theme" id="owl_1">
        @foreach($sliders as $slider)
        <div class="main_slider"
            style="background: url('{{ asset("files/images/slider/" .$slider->image) }}'); no-repeat; background-size: cover;min-height: 500px; width: 100%;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 ">
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
            <section class="about" style="">
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
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        </div>

        <div class="col-md-3 m-auto">
            <div class="card text-center" >
                <div class="title_">Project Director</div>
                <img src="{{asset('files/images/user/head.jpg')}}" class="card-img-top" alt="..." width="220px" height="300px">
                <div class="card-body">
                    <p class="card-text" style="font-size: 16px"><b>Dr. Sadek Ahmed</b><br>
                        Principal Scientific Officer<br>
                        Black Bengal Goat Conservation and Development Research Project</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <section id="testimonial">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4">

            <div class="col">
                <div class="card">
                    <img src="{{asset('files/images/service/f.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <a href="" class="btn btn-primary btn-sm">More</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="{{asset('files/images/service/f.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <a href="" class="btn btn-primary btn-sm">More</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="{{asset('files/images/service/f.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <a href="" class="btn btn-primary btn-sm">More</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="{{asset('files/images/service/f.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <a href="" class="btn btn-primary btn-sm">More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> --}}


{{-- Products --}}
{{-- <section id="courses">
    <div class="container">
        <div class="section_title text-light">Our Board of Directors</div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="owl-carousel owl-theme owl_course" id="owl_2">
                        @foreach ($cvs as $cv)
                        <div class="item">
                            <div class="col-md-12">
                                <div class="board_card">
                                    <div class="board_card_img">
                                        <img class="round" src="{{ asset('files/images/cv/'.$cv->image) }}" width="127px" height="128px" />
                                    </div>
                                    <h3>{{ $cv->name }}</h3>
                                    <h6>{{ $cv->title }}</h6>
                                    <div class="social">
                                        <a href="{{ $cv->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{ $cv->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="{{ $cv->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                    </div>
                                    <br>
                                    <div class="">
                                        <a href="{{ route('cv', $cv->id) }}" class="bord_btn">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

{{-- <section class="service">
    <div class="section_title">Our Services</div>
    <div class="container">
        <div class="row">
            @foreach ($services as $service)
            <div class="col-md-4">
                <div class="card" style="width: 340px;">
                    <img class="card-img-top" src="{{ asset('files/images/service/' .$service->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-center" style="font-size: 20px">{{ $service->name }}</h5>
                        <p class="card-text">{!! \Illuminate\Support\Str::limit($service->info, 400, '...') !!}</p>
                        <a href="{{route('service', $service->id)}}" class="btn btn-primary">More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}

{{-- Products --}}
{{-- <section id="testimonial">
    <div class="container">
        <div class="section_title">Testmonials</div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="owl-carousel owl-theme owl_course" id="owl_3">
                        @foreach ($testmonials as $testmonial)
                        <div class="item">
                            <div class="col-md-12">
                                <div>
                                    <div class="testimonial pl-md-4 mb-0">
                                    <div class="testimonial-img">
                                        <img src="{{ asset('files/images/cv/'. $testmonial->image) }}" class="img-fluid mb-0" style="max-width: 200px; height: auto; width: 175px;">
                                    </div>
                                    <blockquote>
                                        <p class="text-4 line-height-5 mb-0">
                                        <div>
                                            <p>{!! $testmonial->info !!}&nbsp;</p>
                                        </div>
                                        </p>
                                    </blockquote>
                                    <div class="testimonial-author">
                                        <p><strong class="font-weight-extra-bold text-2">{{ $testmonial->name }}</strong><br><span>{{ $testmonial->title}}</span></p>
                                    </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}



<!-- Our Facilities -->
{{-- <section class="facilities">
    <div class="container">
        <h3 class="section_title">Our Facilities</h3>
        <div class="row">
            <div class="col-md-4 wow fadeIn" data-wow-duration="3s" data-wow-delay=".5s">
                <div class="f_card">
                    <img src="{{ asset('files/images/facilities/support.png') }}" alt="">
                    <h3 class="f_title">Lifetime Support</h3>
                    <p class="f_text"></p>
                </div>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-duration="3s" data-wow-delay=".6s">
                <div class="f_card">
                    <img src="{{ asset('files/images/facilities/class-review.png') }}" alt="">
                    <h3 class="f_title">Review Class</h3>
                    <p class="f_text"></p>
                </div>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-duration="3s" data-wow-delay=".7s">
                <div class="f_card">
                    <img src="{{ asset('files/images/facilities/lab.png') }}" alt="">
                    <h3 class="f_title">Practise Lab Support</h3>
                    <p class="f_text"></p>
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-4 wow fadeIn" data-wow-duration="3s" data-wow-delay=".8s">
                <div class="f_card">
                    <img src="{{ asset('files/images/facilities/24.png') }}" alt="">
                    <h3 class="f_title">24/7 Online Support</h3>
                    <p class="f_text"></p>
                </div>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-duration="3s" data-wow-delay=".9s">
                <div class="f_card">
                    <img src="{{ asset('files/images/facilities/video-class.png') }}" alt="">
                    <h3 class="f_title">Class Video</h3>
                    <p class="f_text"></p>
                </div>
            </div>
           <div class="col-md-4">
            <div class="f_card">
              <img src="images/cards/14045.jpg" alt="">
              <h3 class="f_title">Practise Lab Support</h3>
              <p class="f_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eveniet laboriosam provident at optio reiciendis culpa, reprehenderit quam eius harum voluptates </p>
            </div>
          </div>
        </div>
    </div>
</section> --}}

@endsection
