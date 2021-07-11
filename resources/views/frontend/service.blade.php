@extends('frontend.layout.master')
@section('title', 'Service')
@section('content')
<?php $p = 'product'; ?>
<br>
<div class="container">
    {{-- <div class="section_title">OUR DOCTORS</div> --}}
    <div class="row">

        <div class="col-md-12">
            <div class="card px-5">

                <div class="card_line"></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="card-title mt-5" style="font-size: 30px">{{ $service->name }}</h5>
                            {{-- <h5 class="card-title " style="font-size: 14px">{{ $service->title }}</h5> --}}
                        </div>
                        <div class="col-md-5">
                            <img class="card-img-top" src="{{ asset('files/images/service/'.$service->image) }}">
                        </div>
                    </div>

                    <p class="card-text">{!! $service->info !!}</p>
                    {{-- <p class="card-text">{!! \Illuminate\Support\Str::limit($service->info, 600, '...') !!}</p> --}}

                </div>
                {{-- <a href="{{ route('cv', $service->id) }}" class="btn btn-primary btn-sm">More</a> --}}
                {{-- <div class="card_f_line"></div> --}}
            </div>
        </div>

    </div>
</div>

    @endsection
