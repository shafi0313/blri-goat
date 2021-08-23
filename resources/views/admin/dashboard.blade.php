@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('content')
<?php $p = 'da'; $sm='' ?>
@php
    $anumal = App\Models\AnimalInfo::count();
    $totalAnimal = App\Models\AnimalInfo::count();
    $goat = App\Models\AnimalInfo::where('type',1)->count();
    $goatM = App\Models\AnimalInfo::where('sex','M')->where('type',1)->count();
    $goatF = App\Models\AnimalInfo::where('sex','F')->where('type',1)->count();
    $sheep = App\Models\AnimalInfo::where('type',2)->count();
    $sheepM = App\Models\AnimalInfo::where('sex','M')->where('type',2)->count();
    $sheepF = App\Models\AnimalInfo::where('sex','F')->where('type',2)->count();
@endphp

<input type="hidden" id="totalAnimal" value="{{ $totalAnimal }}">
<input type="hidden" id="goat" value="{{ $goat }}">
<input type="hidden" id="goatM" value="{{ $goatM }}">
<input type="hidden" id="goatF" value="{{ $goatF }}">
<input type="hidden" id="sheep" value="{{ $sheep }}">
<input type="hidden" id="sheepM" value="{{ $sheepM }}">
<input type="hidden" id="sheepF" value="{{ $sheepF }}">
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header mb-4">
                <h4 class="page-title" style="font-size: 25px">BLRI Research Farm</h4>
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

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="pills-goat-tab" data-toggle="pill" href="#pills-goat" role="tab" aria-controls="pills-goat" aria-selected="true">Goat</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-sheep-tab" data-toggle="pill" href="#pills-sheep" role="tab" aria-controls="pills-sheep" aria-selected="false">Sheep</a>
                        </li>
                      </ul>
                      {{-- <div class="text-center mb-2" style="font-size: 25px;">Dashboard (Goat)</div> --}}
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-goat" role="tabpanel" aria-labelledby="pills-goat-tab">

                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-primary card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="flaticon-users"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Visitors</p>
                                                        <h4 class="card-title">1,294</h4>
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
                                                        <i class="flaticon-interface-6"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Subscribers</p>
                                                        <h4 class="card-title">1303</h4>
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
                                                        <i class="flaticon-analytics"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Sales</p>
                                                        <h4 class="card-title">$ 1,345</h4>
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
                                                        <i class="flaticon-success"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Order</p>
                                                        <h4 class="card-title">576</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-sheep" role="tabpanel" aria-labelledby="pills-sheep-tab">...</div>
                      </div>
                </div>
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
                <div class="col">
                    <div id="total_animal" ></div>
                </div>
                <div class="col">
                    <div id="total_goat"></div>
                </div>
                <div class="col">
                    <div id="total_sheep" ></div>
                </div>
            </div> --}}


        </div>

    </div>
    @include('admin.layout.footer')
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load("current", {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var goat = Number($("#goat").val());
        var sheep = Number($("#sheep").val());
        var totalAnimal = Number($("#totalAnimal").val());
        var data = google.visualization.arrayToDataTable([

            ["Element", "Density", {
                role: "style"
            }],
            ["Total Animal", totalAnimal, "#b87333"],
            ["Goat", goat, "silver"],
            ["Sheep", sheep, "gold"],
            // ["Platinum", 21.45, "color: #e5e4e2"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);

        var options = {
            title: "Animal Chart",
            width: 400,
            height: 400,
            bar: {
                groupWidth: "95%"
            },
            legend: {
                position: "none"
            },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("total_animal"));
        chart.draw(view, options);
    }
</script>


<script type="text/javascript">
    google.charts.load("current", {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var goat = Number($("#goat").val());
        var goatM = Number($("#goatM").val());
        var goatF = Number($("#goatF").val());
        var data = google.visualization.arrayToDataTable([

            ["Element", "Density", {
                role: "style"
            }],
            ["Total Goat", goat, "#b87333"],
            ["Male", goatM, "goatM"],
            ["Female", goatF, "goatF"],
            // ["Platinum", 21.45, "color: #e5e4e2"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);

        var options = {
            title: "Goat",
            width: 400,
            height: 400,
            bar: {
                groupWidth: "95%"
            },
            legend: {
                position: "none"
            },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("total_goat"));
        chart.draw(view, options);
    }
</script>

<script type="text/javascript">
    google.charts.load("current", {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var sheep = Number($("#sheep").val());
        var sheepM = Number($("#sheepM").val());
        var sheepF = Number($("#sheepF").val());
        var data = google.visualization.arrayToDataTable([

            ["Element", "Density", {
                role: "style"
            }],
            ["Total Sheep", sheep, "#b87333"],
            ["Male", sheepM, "sheepM"],
            ["Female", sheepF, "sheepF"],
            // ["Platinum", 21.45, "color: #e5e4e2"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);

        var options = {
            title: "Sheep",
            width: 400,
            height: 400,
            bar: {
                groupWidth: "95%"
            },
            legend: {
                position: "none"
            },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("total_sheep"));
        chart.draw(view, options);
    }
</script>

@endsection

