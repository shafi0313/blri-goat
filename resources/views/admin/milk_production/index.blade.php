@extends('admin.layout.master')
@section('title', 'Milk Production')
@section('content')
@php $p='animalRecord'; $sm="milkProduction"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                    <a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Milk Production</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Milk Production</h4>
                                <a href="{{route('milk-production.create')}}" class="btn btn-primary btn-round ml-auto text-light"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead class="bg-secondary thw">
                                        <tr class="text-center">
                                            <th style="width: 35px">SL</th>
                                            <th>Animal Tag</th>
                                            <th>Parity number</th>
                                            <th>Litter Size</th>
                                            <th>Date of Milking</th>
                                            <th>Milk Production (ml)</th>
                                            <th>Average milk production (ml)</th>
                                            <th>Lactation length (day)</th>
                                            <th>Milk yield/ lactation</th>
                                            <th class="no-sort" style="text-align:center;width:80px" >Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x=1; @endphp
                                        @foreach ($milkProductions as $milkProduction)
                                        <tr class="text-center">
                                            <td>{{ $x++ }} </td>
                                            <td>{{ $milkProduction->animalInfo->animal_tag }} </td>
                                            {{-- <td>{{ $milkProduction->animalInfo->paity }} </td>
                                            <td>{{ $milkProduction->animalInfo->litter_size }} </td> --}}
                                            <td>{{ $milkProduction->parity_number }}</td>
                                            <td>{{ $milkProduction->litter_size }}</td>
                                            <td>{{ \Carbon\Carbon::parse($milkProduction->date_of_milking)->format('d/m/Y') }} </td>
                                            <td>{{ $milkProduction->milk_production }} </td>
                                            <td>{{ $milkProduction->average_milk_production }}</td>
                                            <td>{{ $milkProduction->lactation_length }}</td>
                                            <td>{{ $milkProduction->milk_yield }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    {{-- <a href="{{route('reproduction-record.edit',$milkProduction->id)}}" title="Edit" class="btn btn-link btn-primary btn-lg">
                                                        <i class="fa fa-edit"></i>
                                                    </a> --}}
                                                    <form action="{{ route('milk-production.destroy', $milkProduction->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" title="Delete" class="btn btn-link btn-danger" onclick="return confirm('Are you sure?')">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
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

