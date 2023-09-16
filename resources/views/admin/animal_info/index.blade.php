@extends('admin.layout.master')
@section('title', 'Animal Information')
@section('content')
    @php
        $p = 'animalRecord';
        $sm = 'animalInfo';
    @endphp
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a>
                        </li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item active">Animal Information</li>
                    </ul>
                </div>
                <div class="divider1"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Animal Information</h4>
                                    <a href="{{ route('animalInfo.downloadSelect') }}"
                                        class="btn btn-info btn-round ml-auto text-light"><i class="fas fa-file-excel"></i>
                                        Download</a>&nbsp;&nbsp;
                                    <a href="{{ route('animal-info.create') }}"
                                        class="btn btn-primary btn-round text-light"><i class="fa fa-plus"></i> Add New</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="data_table" class="table table-striped table-hover">
                                        <thead class="bg-secondary thw">
                                            <tr class="text-center">
                                                <th style="width: 35px">SL</th>
                                                <th>Farm</th>
                                                <th>Animal Tag</th>
                                                <th>Breed</th>
                                                <th>Coat color</th>
                                                <th>Sex</th>
                                                <th>Birth Wt. (kg)</th>
                                                <th>Litter Size</th>
                                                <th>Generation</th>
                                                <th>Paity</th>
                                                <th>Sire</th>
                                                <th>Dam</th>
                                                <th>Date of Birth</th>
                                                <th>Season of Birth</th>
                                                <th>Remark</th>
                                                <th style="text-align:center;width:80px">Action</th>
                                            </tr>
                                        </thead>
                                        {{-- <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tfoot> --}}
                                        <tbody>
                                            {{-- @php $x=1; @endphp
                                            @foreach ($animalInfos as $animalInfo)
                                                <tr class="text-center">
                                                    <td>{{ $x++ }} </td>
                                                    <td>{{ $animalInfo->farm != null ? $animalInfo->farm->name : ($animalInfo->community_cat_id != null ? $animalInfo->communityCat->name : '') }}
                                                    </td>
                                                    <td>{{ $animalInfo->animal_tag }} </td>
                                                    <td class="text-left">{{ $animalInfo->animalCat->name }} </td>
                                                    <td>{{ $animalInfo->color }} </td>
                                                    <td>{{ $animalInfo->sex }} </td>
                                                    <td>{{ $animalInfo->birth_wt }} </td>
                                                    <td>{{ $animalInfo->litter_size }} </td>
                                                    <td>{{ $animalInfo->generation }} </td>
                                                    <td>{{ $animalInfo->paity }} </td>
                                                    <td>{{ $animalInfo->sire }} </td>
                                                    <td>{{ $animalInfo->dam }} </td>
                                                    <td>{{ bdDate($animalInfo->d_o_b) }} </td>
                                                    <td>{{ $animalInfo->season_o_birth }} </td>
                                                    <td>{{ $animalInfo->remark }} </td>
                                                    <td class="text-center">
                                                        <div class="form-button-action">
                                                            <a href="{{ route('animal-info.edit', $animalInfo->id) }}"
                                                                title="Edit" class="btn btn-link btn-primary btn-lg">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('animal-info.destroy', $animalInfo->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" title="Delete"
                                                                    class="btn btn-link btn-danger"
                                                                    data-original-title="Remove"
                                                                    onclick="return confirm('Are you sure?')">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach --}}
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
        <script>
            $(function() {
                $('#data_table').DataTable({
                    processing: true,
                    serverSide: true,
                    deferRender: true,
                    ordering: true,
                    responsive: true,
                    scrollY: 400,
                    ajax: "{{ route('animal-info.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            className: "text-center",
                            width: "50px",
                            searchable: false,
                            orderable: false,
                        },
                        {
                            data: 'farm',
                            name: 'farm'
                        },
                        {
                            data: 'animal_tag',
                            name: 'animal_tag'
                        },
                        {
                            data: 'animalCatName',
                            name: 'animalCatName'
                        },
                        {
                            data: 'color',
                            name: 'color'
                        },
                        {
                            data: 'sex',
                            name: 'sex'
                        },
                        {
                            data: 'birth_wt',
                            name: 'birth_wt'
                        },
                        {
                            data: 'litter_size',
                            name: 'litter_size'
                        },
                        {
                            data: 'generation',
                            name: 'generation'
                        },
                        {
                            data: 'paity',
                            name: 'paity'
                        },
                        {
                            data: 'sire',
                            name: 'sire'
                        },
                        {
                            data: 'dam',
                            name: 'dam'
                        },
                        {
                            data: 'd_o_b',
                            name: 'd_o_b'
                        },
                        {
                            data: 'season_o_birth',
                            name: 'season_o_birth'
                        },
                        {
                            data: 'remark',
                            name: 'remark'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                    // fixedColumns: false,
                    scroller: {
                        loadingIndicator: true
                    },
                    // order: [
                    //     [1, 'asc']
                    // ]
                });
            });
        </script>
        <script>
            // $(document).ready(function() {
            //     $('#basic-datatables').DataTable({});
            //     $('#multi-filter-select').DataTable({
            //         "lengthMenu": [
            //             [50, 100, -1],
            //             [50, 100, "All"]
            //         ],
            //         "order": [],
            //         initComplete: function() {
            //             this.api().columns().every(function() {
            //                 var column = this;
            //                 var select = $(
            //                         '<select class="form-control form-control-sm"><option value=""></option></select>'
            //                     )
            //                     .appendTo($(column.footer()).empty())
            //                     .on('change', function() {
            //                         var val = $.fn.dataTable.util.escapeRegex(
            //                             $(this).val()
            //                         );

            //                         column
            //                             .search(val ? '^' + val + '$' : '', true, false)
            //                             .draw();
            //                     });

            //                 column.data().unique().sort().each(function(d, j) {
            //                     select.append('<option value="' + d + '">' + d +
            //                         '</option>')
            //                 });
            //             });
            //         }
            //     });
            // });
        </script>
    @endpush

@endsection
