@extends('frontend.layout.master')
@section('title', 'Product')
@section('content')
<?php $p = 'product'; ?>
<!-- Header -->
{{-- <section class="page_header">
  <div class="container">
    <div class="row product_content_area">
      <div class="col-md-12">
        <h3>Blog</h3>
            <a href="{{ Route('index') }}">Home > </a> <span><a href="{{ url('/product') }}">Blog</a></span><span> >
    Read More</span>
</div>
</div>
</div>
</section> --}}
<style>
    p{
        margin-bottom: 5px !important;
    }
</style>

<section class="read_product_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-4">
                <h2 class="product_tilte">{{ $product->name }}</h2>
                <h5 class="display-5">{{ $product->generic }} </h5>
                <p>
                    <span><i class="fas fa-calendar-alt"></i>
                        {{ date('d M, Y', strtotime($product->updated_at)) }}</span>
                    <span>&nbsp;<i class="fas fa-clock"> </i>
                        {{ date('h:i A', strtotime($product->updated_at)) }}</span>
                </p>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="read_product_img">
                    <img style="height: 400px; width:400px;"
                        src="{{ asset('images/product/' .$product->image) }}" alt=""></td>
                </div>
            </div>
            <div class="col-md-7">
                <h3>Introduction:</h3>
                <p class="product_text">{!! $product->indications !!}</p>
                <h4>Dosage:</h4>
                <p class="product_text">{!! $product->dosage !!}</p>
                <h4>Origin:</h4>
                <p class="product_text">{!! $product->origin !!}</p>
                <br>
                <div class="course_f_price d-flex">
                    <table class="table table-border table-sm col-6">
                        <tr>
                            <th>Size</th>
                            <th>Price</th>
                        </tr>
                        @foreach ($prices as $price)
                        <tr>
                            <td>{{ $price->size }}</td>
                            <td><small class="text-muted">MRP:
                                <span style="font-size: 18px">&#2547;</span>
                                {{ number_format($price->mrp,2) }}</small></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
