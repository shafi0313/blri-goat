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

            <div class="row">
                <div class="col">
                    <div id="total_animal" ></div>
                </div>
                <div class="col">
                    <div id="total_goat"></div>
                </div>
                <div class="col">
                    <div id="total_sheep" ></div>
                </div>
            </div>


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

