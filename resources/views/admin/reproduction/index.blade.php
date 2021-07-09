@extends('admin.layout.master')
@section('title', 'Reproduction Record')
@section('content')
@php $p='animalRecord'; $sm="reProRecord"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                    <a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Reproduction Record</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Reproduction Record</h4>
                                <a href="{{route('reproduction-record.create')}}" class="btn btn-primary btn-round ml-auto text-light"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead class="bg-secondary thw">
                                        <tr class="text-center">
                                            <th style="width: 35px">SL</th>
                                            <th>Animal Tag</th>
                                            <th>Coat color</th>
                                            <th>Sex</th>
                                            <th>Age at Puberty (Months)	</th>
                                            <th>Date at 1st service</th>
                                            <th>Date of 1st kidding</th>
                                            <th>gestation length at 1st kidding</th>
                                            <th>Age at 1st kidding</th>
                                            <th>Litter size at 1st kidding</th>
                                            <th>Milk production (ml)</th>
                                            <th>Date at 2nd service</th>
                                            <th>Date of 2nd kidding</th>
                                            <th>Litter size at 2nd kidding</th>
                                            <th>Date at 3rd service</th>
                                            <th>Date of 3rd kidding</th>
                                            <th>Litter size at 3rd kidding</th>
                                            <th>Date at 4th service</th>
                                            <th>Date of 4th kidding</th>
                                            <th>Litter size at 4th kidding</th>
                                            <th>Date at 5th service</th>
                                            <th>Date of 5th kidding</th>
                                            <th>Litter size at 5th kidding</th>
                                            <th>Date at 6th service</th>
                                            <th>Date of 6th kidding</th>
                                            <th>Litter size at 6th kidding</th>
                                            <th>Remarks</th>


                                            <th class="no-sort" style="text-align:center;width:80px" >Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x=1; @endphp
                                        @foreach ($reproductions as $reproduction)
                                        <tr class="text-center">
                                            <td>{{ $x++ }} </td>
                                            <td>{{ $reproduction->animalInfo->animal_tag }} </td>
                                            <td>{{ $reproduction->animalInfo->sex }} </td>
                                            <td>{{ $reproduction->animalInfo->color }} </td>
                                            <td>{{ $reproduction->puberty_age }}</td>
                                            <td>{{ $reproduction->service_1st_date }}</td>
                                            <td>{{ $reproduction->kidding_1st_date }}</td>
                                            <td>{{ $reproduction->ges_lenght_1st_kidding }}</td>
                                            <td>{{ $reproduction->age_1st_kidding }}</td>
                                            <td>{{ $reproduction->litter_size_1st_kidding }}</td>
                                            <td>{{ $reproduction->milk_production }}</td>
                                            <td>{{ $reproduction->service_2nd_date }}</td>
                                            <td>{{ $reproduction->kidding_2nd_date }}</td>
                                            <td>{{ $reproduction->kidding_2nd_liter }}</td>
                                            <td>{{ $reproduction->service_3rd_date }}</td>
                                            <td>{{ $reproduction->kidding_3rd_date }}</td>
                                            <td>{{ $reproduction->kidding_3rd_liter }}</td>
                                            <td>{{ $reproduction->service_4th_date }}</td>
                                            <td>{{ $reproduction->kidding_4th_date }}</td>
                                            <td>{{ $reproduction->kidding_4th_liter }}</td>
                                            <td>{{ $reproduction->service_5th_date }}</td>
                                            <td>{{ $reproduction->kidding_5th_date }}</td>
                                            <td>{{ $reproduction->kidding_5th_liter }}</td>
                                            <td>{{ $reproduction->service_6th_date }}</td>
                                            <td>{{ $reproduction->kidding_6th_date }}</td>
                                            <td>{{ $reproduction->kidding_6th_liter }}</td>
                                            <td>{{ $reproduction->remarks }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{route('reproduction-record.edit',$reproduction->id)}}" title="Edit" class="btn btn-link btn-primary btn-lg">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    {{-- <form action="{{ route('farm.destroy', $reproduction->id) }}" method="POST">
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

