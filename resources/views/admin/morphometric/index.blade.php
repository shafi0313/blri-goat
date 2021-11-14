@extends('admin.layout.master')
@section('title', 'Morphometric')
@section('content')
@php $p='animalRecord'; $sm="morphometric"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                    <a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Morphometric</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Morphometric</h4>
                                <a href="{{route('morphometric.create')}}" class="btn btn-primary btn-round ml-auto text-light"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead class="bg-secondary thw">
                                        <tr class="text-center">
                                            <th style="width: 35px">SL</th>
                                            <th>Animal Tag</th>
                                            <th>Sex</th>
                                            {{-- <th>Age</th> --}}
                                            <th>Body length (cm)</th>
                                            <th>Weigher height</th>
                                            <th>Horn pattern</th>
                                            <th>Horn length</th>
                                            <th>Tail length</th>
                                            <th>Ear length</th>
                                            <th>H.girth length</th>
                                            <th>Height of rump</th>
                                            <th>Head length</th>
                                            <th>Eye to eye length</th>
                                            <th class="no-sort" style="text-align:center;width:80px" >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $x=1; @endphp
                                        @foreach ($morphometrics as $morphometric)
                                        <tr class="text-center">
                                            <td>{{ $x++ }} </td>
                                            <td>{{ $morphometric->animalInfo->animal_tag }} </td>
                                            <td>{{ $morphometric->animalInfo->sex }} </td>
                                            {{-- <td>{{ $morphometric->age }} </td> --}}
                                            <td>{{ $morphometric->body_lenght }} </td>
                                            <td>{{ $morphometric->weither_height }} </td>
                                            <td>{{ $morphometric->horn_pattern }} </td>
                                            <td>{{ $morphometric->horn_length }} </td>
                                            <td>{{ $morphometric->tail_length }} </td>
                                            <td>{{ $morphometric->ear_length }} </td>
                                            <td>{{ $morphometric->h_girth_length }} </td>
                                            <td>{{ $morphometric->height_of_rump }} </td>
                                            <td>{{ $morphometric->head_length }} </td>
                                            <td>{{ $morphometric->eye_to_eye_length }} </td>
                                            <td>
                                                <div class="form-button-action">
                                                    {{-- <a href="{{route('reproduction-record.edit',$morphometric->id)}}" title="Edit" class="btn btn-link btn-primary btn-lg">
                                                        <i class="fa fa-edit"></i>
                                                    </a> --}}
                                                    <form action="{{ route('morphometric.destroy', $morphometric->id) }}" method="POST">
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

