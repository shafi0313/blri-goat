@extends('admin.layout.master')
@section('title', 'Deworming')
@section('content')
@php $p='healthM'; $sm="deworming"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                    <a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Deworming</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Deworming</h4>
                                <a href="{{route('deworming.create')}}" class="btn btn-primary btn-round ml-auto text-light"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead class="bg-secondary thw">
                                        <tr class="text-center">
                                            <th style="width: 35px">SL</th>
                                            <th>Type</th>
                                            <th>Name of Medicine</th>
                                            <th>Date of Deworming</th>
                                            <th>Next Date of Deworming</th>
                                            <th>Dose</th>
                                            <th class="no-sort" style="text-align:center;width:80px" >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $x=1; @endphp
                                        @foreach ($dewormings as $dewormin)
                                        @php $deworming =  $dewormin->first() @endphp
                                        <tr class="text-center">
                                            <td>{{ $x++ }} </td>
                                            @switch($deworming->medicine_type)
                                                @case(1)
                                                    @php $type='Injectable' @endphp
                                                    @break
                                                @case(2)
                                                    @php $type='Oral' @endphp
                                                    @break
                                                @default
                                                    @php $type='Others' @endphp

                                            @endswitch
                                            <td>{{ $type }}</td>
                                            <td>{{ $deworming->medicine_name }}</td>
                                            <td>{{ bdDate($deworming->deworming_date) }}</td>
                                            <td>{{ nextDate($deworming->deworming_date,90) }}</td>
                                            <td>{{ $deworming->dose }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{route('deworming.show',$deworming->group)}}" title="Show Details">
                                                        Show Details
                                                    </a>
                                                    {{-- <form action="{{ route('deworming.destroy', $deworming->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" title="Delete" class="btn btn-link btn-danger" onclick="return confirm('Are you sure?')">
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

