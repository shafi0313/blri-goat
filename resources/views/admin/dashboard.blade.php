@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('content')
<?php $p = 'da'; $sm='' ?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
                {{-- <div class="btn-group btn-group-page-header ml-auto">
                    <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-h"></i>
                    </button>
                    <div class="dropdown-menu">
                        <div class="arrow"></div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div> --}}
            </div>
            <style>
                .card-category {
                    font-size: 14px;
                    font-weight: bold;
                }
                .card-stats .card-body  {
                    padding: 10px !important;
                    margin: 0;
                }
            </style>

            {{-- <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Author User</p>
                                        <h4 class="card-title"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-info card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <a href="">
                                            <p class="card-category">Total Farm</p>
                                            <h4 class="card-title">{{$farms}}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-success card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-user-friends"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <a href="">
                                            <p class="card-category">Total Community</p>
                                            <h4 class="card-title">{{$communities}}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-secondary card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-pills"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <a href="">
                                            <p class="card-category">Total Goat</p>
                                            <h4 class="card-title"> 100</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="row">
                {{-- <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-cart-plus"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Purchase Amount</p>
                                        <h4 class="card-title">{{ number_format($totalPurchase,2) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-info card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <a href="#">
                                            <p class="card-category">Total Sales Amount</p>
                                            <h4 class="card-title"></h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4"> --}}
                    {{-- <div class="card card-stats card-info card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-calculator"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <a href="#">
                                            <p class="card-category">Profit</p>
                                            <h4 class="card-title">{{ number_format($totalSales - $totalPurchase,2) }}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-success card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <a href="#">
                                            <p class="card-category">Total Credit</p>
                                            <h4 class="card-title">{{ number_format($credit,2) }} </h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-secondary card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <a href="#">
                                            <p class="card-category">Total Debit</p>
                                            <h4 class="card-title"> {{ number_format($debit,2) }} </h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-info card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-calculator"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <a href="#">
                                            <p class="card-category">Profit</p>
                                            <h4 class="card-title"> {{ number_format($credit - $debit,2) }} </h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


            {{-- <div class="row">
                <div class="col-md-6">
                    <h1 class="text-center">Products Stock</h1>
                    <style>
                        table thead tr th {color: white !important;}
                    </style>
                    <table class="table table-striped table-hover table-sm table-bordered">
                        <thead class="bg-success">
                            <tr>
                                <th class="text-center">SL</th>
                                <th>Name</th>
                                <th>Size</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Damaged</th>
                                <th class="text-center">Total Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productStocks as $key => $productStock)
                            <tr>
                                <td class="text-center">{{ ++$key }} </td>
                                <td>{{ $productStock->product->name }} </td>
                                <td>{{ $productStock->productPackSize->size }} </td>
                                <td class="text-center">{{ $productStock->quantity }} </td>
                                <td class="text-center">{{ $productStock->damage }} </td>
                                @php
                                    if($productStock->damage <1 ){
                                        $total = $productStock->quantity + $productStock->damage;
                                    }else{
                                        $total = $productStock->quantity - $productStock->damage;
                                    }
                                @endphp
                                <td class="text-center {{($total<0)? 'bg-danger text-light':'' }}">{{ $total }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <h1 class="text-center">Raw Material Stock</h1>
                    <style>
                        table thead tr th {color: white !important;}
                    </style>
                    <table class="table table-striped table-hover table-sm table-bordered">
                        <thead class="bg-info">
                            <tr>
                                <th class="text-center">SL</th>
                                <th>Name</th>
                                <th>Size</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Damaged</th>
                                <th class="text-center">Total Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materialStocks as $key => $productStock)
                            <tr>
                                <td class="text-center">{{ ++$key }} </td>
                                <td>{{ $productStock->product->name }} </td>
                                <td>{{ $productStock->productPackSize->size }} </td>
                                <td class="text-center">{{ $productStock->quantity }} </td>
                                <td class="text-center">{{ $productStock->damage }} </td>
                                @php
                                    if($productStock->damage <1 ){
                                        $total = $productStock->quantity + $productStock->damage;
                                    }else{
                                        $total = $productStock->quantity - $productStock->damage;
                                    }
                                @endphp
                                <td class="text-center {{($total<0)? 'bg-danger text-light':'' }}">{{ $total }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> --}}

            <div class="row">
                {{-- {{Auth::admin()->name}} --}}

                {{-- <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-procedures"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Patients</p>
                                        <h4 class="card-title"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                        <i class="fas fa-user-md"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Doctors</p>
                                        <h4 class="card-title"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Appointments</p>
                                        <h4 class="card-title"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}






            </div>
        </div>
    </div>
</div>
@endsection

