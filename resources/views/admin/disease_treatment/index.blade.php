@extends('admin.layout.master')
@section('title', 'Disease and Treatment')
@section('content')
@php $p='healthM'; $sm="diseaseTreatment"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                    <a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Disease and Treatment</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Disease and Treatment</h4>
                                <a href="{{route('disease-and-treatment.create')}}" class="btn btn-primary btn-round ml-auto text-light"><i class="fa fa-plus"></i> Add New</a>
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
                                            {{-- <th>Breed</th> --}}
                                            <th>Name of Disease</th>
                                            <th>Clinical Sign</th>
                                            <th>Season of Disease</th>
                                            <th>Medicine Prescribed</th>
                                            <th>Recovered/ Dead</th>
                                            <th class="no-sort" style="text-align:center;width:80px" >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $x=1; @endphp
                                        @foreach ($diseaseTreatments as $diseaseTreatment)
                                        <tr class="text-center">
                                            <td>{{ $x++ }} </td>
                                            <td>{{ $diseaseTreatment->animalInfo->animal_tag }} </td>
                                            <td>{{ animalType($diseaseTreatment->animalInfo->type) }} </td>
                                            <td>{{ $diseaseTreatment->animalInfo->sex }} </td>
                                            {{-- <td>{{ $diseaseTreatment->animalInfo->breed }} </td> --}}
                                            <td>{{ $diseaseTreatment->disease->name }} </td>
                                            <td>{{ $diseaseTreatment->clinicalSign->name }} </td>
                                            <td>{{ $diseaseTreatment->disease_season }} </td>
                                            <td>{{ $diseaseTreatment->medicine_prescribed }} </td>
                                            <td>{{ $diseaseTreatment->recovered_dead }} </td>
                                            <td>
                                                <div class="form-button-action">
                                                    {{-- <a href="{{route('disease-and-treatment.edit',$diseaseTreatment->id)}}" title="Edit" class="btn btn-link btn-primary btn-lg">
                                                        <i class="fa fa-edit"></i>
                                                    </a> --}}
                                                    <form action="{{ route('disease-and-treatment.destroy', $diseaseTreatment->id) }}" method="POST">
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

