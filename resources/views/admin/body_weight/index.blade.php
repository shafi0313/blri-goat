@extends('admin.layout.master')
@section('title', 'Body Weight')
@section('content')
@php $p='animalRecord'; $sm="production"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                    <a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Body Weight</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Body Weight</h4>
                                <a href="{{route('body-weight.create')}}" class="btn btn-primary btn-round ml-auto text-light"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead class="bg-secondary thw">
                                        <tr class="text-center">
                                            <th style="width: 35px">SL</th>
                                            <th>Animal Tag</th>
                                            <th>Type</th>
                                            <th>Sex</th>
                                            <th>Birth Wt.(kg)</th>
                                            <th>1 m. body wt.(kg)</th>
                                            <th>2 m. body wt.(kg)</th>
                                            <th>3 m. body wt.(kg)</th>
                                            <th>4 m. body wt.(kg)</th>
                                            <th>5 m. body wt.(kg)</th>
                                            <th>6 m. body wt.(kg)</th>
                                            <th>7 m. body wt.(kg)</th>
                                            <th>8 m. body wt.(kg)</th>
                                            <th>9 m. body wt.(kg)</th>
                                            <th>10 m. body wt.(kg)</th>
                                            <th>11 m. body wt.(kg)</th>
                                            <th>12 m. body wt.(kg)</th>
                                            <th>Growth rate at 3 months (g/d)</th>
                                            <th>Growth rate at 6 months (g/d)</th>
                                            <th>Growth rate at 9 months (g/d)</th>
                                            <th>Growth rate at 12 months (g/d)</th>
                                            <th class="no-sort" style="text-align:center;width:80px" >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $x=1; @endphp
                                        @foreach ($productionRecords as $productionRecord)
                                        <tr class="text-center">
                                            <td>{{ $x++ }} </td>
                                            <td>{{ $productionRecord->animalInfo->animal_tag }} </td>
                                            <td>{{ animalType($productionRecord->animalInfo->type) }} </td>
                                            <td>{{ $productionRecord->animalInfo->sex }} </td>
                                            <td>{{ $productionRecord->animalInfo->birth_wt }} </td>
                                            <td>{{ $productionRecord->month_1 }} </td>
                                            <td>{{ $productionRecord->month_2 }} </td>
                                            <td>{{ $productionRecord->month_3 }} </td>
                                            <td>{{ $productionRecord->month_4 }} </td>
                                            <td>{{ $productionRecord->month_5 }} </td>
                                            <td>{{ $productionRecord->month_6 }} </td>
                                            <td>{{ $productionRecord->month_7 }} </td>
                                            <td>{{ $productionRecord->month_8 }} </td>
                                            <td>{{ $productionRecord->month_9 }} </td>
                                            <td>{{ $productionRecord->month_10 }} </td>
                                            <td>{{ $productionRecord->month_11 }} </td>
                                            <td>{{ $productionRecord->month_12 }} </td>

                                            @isset($productionRecord->month_3)
                                            <td>{{ float2(($productionRecord->month_3 - $productionRecord->animalInfo->birth_wt/90)*1000)}} </td>
                                            @else
                                            <td></td>
                                            @endisset

                                            @isset($productionRecord->month_6)
                                            <td>{{ float2(($productionRecord->month_6 - $productionRecord->animalInfo->birth_wt/180)*1000)}} </td>
                                            @else
                                            <td></td>
                                            @endisset

                                            @isset($productionRecord->month_9)
                                            <td>{{ float2(($productionRecord->month_9 - $productionRecord->animalInfo->birth_wt/270)*1000)}} </td>
                                            @else
                                            <td></td>
                                            @endisset

                                            @isset($productionRecord->month_12)
                                            <td>{{ float2(($productionRecord->month_12 - $productionRecord->animalInfo->birth_wt/360))*1000}} </td>
                                            @else
                                            <td></td>
                                            @endisset
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{route('body-weight.edit',$productionRecord->id)}}" title="Edit" class="btn btn-link btn-primary btn-lg">
                                                        Edit
                                                    </a>
                                                    {{-- <form action="{{ route('farm.destroy', $productionRecord->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" title="Delete" class="btn btn-link btn-danger" data-original-title="Remove" onclick="return confirm('Are you sure?')">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form> --}}
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layout.footer')
</div>

@push('custom_scripts')
<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });

        $('#multi-filter-select').DataTable( {
            "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control form-control-sm"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                            );

                        column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                    } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });
        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';
    });
</script>
@endpush

@endsection

