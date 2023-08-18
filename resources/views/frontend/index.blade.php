@extends('frontend.layout.master')
{{-- @section('title')  --}}
@section('content')
    <!--slider area start-->
    <div class="slider_area slider_style owl-carousel">
        @foreach ($sliders as $slider)
            <div class="single_slider" data-bgimg="{{ asset('files/images/slider/' . $slider->image) }}">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="slider_content content_one">
                                {{-- <img src="{{ asset('files/images/slider/' . $slider->image) }}" alt=""> --}}
                                <h2>{{ $slider->title }}</h2>
                                <h3>{{ $slider->sub_title }}</h3>
                                @if ($slider->link != '')
                                    <a href="{{ $slider->link }}">{{ $slider->link_name }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!--slider area end-->

    <section class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Welcome To BLRI</h2>
                    <p>The institute was founded in 1984 in Savar Upazila, Dhaka division, Bangladesh. The executive head is
                        the director general and a 14-member board of management. The chairman is the Minister for Fisheries
                        and Livestock. In 2014, it developed a new species of layer chicken whose sex was discernable at
                        day one of their life. It developed cattle feed from moringa tree and vegetable waste.</p>
                    <button class="btn btn-primary">More..</button>
                </div>
            </div>
        </div>
    </section>

    <style>
        :root {
            --red: hsl(0, 78%, 62%);
            --cyan: hsl(180, 62%, 55%);
            --orange: hsl(34, 97%, 64%);
            --blue: hsl(212, 86%, 64%);
            --varyDarkBlue: hsl(234, 12%, 34%);
            --grayishBlue: hsl(228, 2%, 42%);
            --veryLightGray: hsl(0, 0%, 98%);
            --weight1: 200;
            --weight2: 400;
            --weight3: 600;
        }

        .message h1:first-of-type {
            font-weight: var(--weight1);
            color: var(--varyDarkBlue);
        }

        .message h1:last-of-type {
            color: var(--varyDarkBlue);
        }

        @media (max-width: 400px) {
            .message h1 {
                font-size: 1.5rem;
            }
        }

        .box p {
            color: var(--grayishBlue);
            font-size: 16px;
            padding-top: 10px;
        }

        .box {
            border-radius: 5px;
            box-shadow: 0px 30px 40px -20px var(--grayishBlue);
            padding: 20px 30px;
            margin: 20px;
            text-align: center;
        }

        .message img {
            /* float: right; */
            display: block;
            margin: 0 auto;
            border-radius: 5px;
        }

        @media (max-width: 450px) {
            .box {
                height: 200px;
            }
        }

        @media (max-width: 950px) and (min-width: 450px) {
            .box {
                text-align: center;
                height: 180px;
            }
        }

        .cyan {
            border-top: 3px solid var(--cyan);
        }

        .red {
            border-top: 3px solid var(--red);
        }

        .blue {
            border-top: 3px solid var(--blue);
        }

        .orange {
            border-top: 3px solid var(--orange);
        }

        .message h2 {
            color: var(--varyDarkBlue);
            font-weight: var(--weight3);
            font-size: 20px;
        }

        @media (min-width: 950px) {
            .row1-container {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .box-down {
                position: relative;
                max-width: 300px;
                /* top: 150px; */
            }

            .box {
                width: 20%;
            }

            .header p {
                width: 30%;
            }
        }
    </style>
    <section class="message">
        <div class="row1-container">
            <div class="box box-down blue">
                <h2>Dr. Sadek Ahmed</h2>
                <img src="{{ asset('files/images/user/head.jpg') }}" alt="Dr. Sadek Ahmed" style="width: 240px">
                <p>Black bengal goat conservation & development project <br> BLRI, Savar, Dhaka.</p>
            </div>

            <div class="box box-down cyan">
                <h2>Nure Hasina Disha</h2>
                <img src="{{ asset('files/images/user/disha.png') }}" alt="Nure Hasina Disha" style="width: 240px">
                <p>Goat & sheep production research division <br>BLRI, Savar, Dhaka.</p>
            </div>
        </div>
    </section>


    <section class="notice">
        <div class="container">
            <div class="row">
                <h3 class="text-center">NOTICE BOARD</h3>
                <div class="search-heading">
                    <h3>General</h3>
                </div>
                <div class="col-md-12">
                    <a href="">
                        <div class="text">
                            <h4>Notice on d</h4>
                            <hr>
                            <p> Published on 17 Aug 2022</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>



    {{-- <section class="gallery">
        <div class="container">
            <h3 class="title">GALLERY</h3>
            <div class="row">
                <div class="col-md-6">
                    <img src="img/school.jpg" alt="">
                </div>
                <div class="col-md-6">
                    <img src="img/school.jpg" alt="">
                </div>
            </div>
        </div>
    </section> --}}
@endsection
