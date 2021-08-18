@extends('admin.layout.master')
@section('title', 'Admin User')
@section('content')
@php $p='admin'; $sm='adminIndex'; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard')}}" title="Dashboard"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Admin user</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Admin User</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="{{ route('admin-user.create') }}">
                                    <i class="fa fa-plus"></i>
                                    Add New Admin User
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead class="bg-secondary thw">
                                        <tr>
                                            <th style="width:35px">SN</th>
                                            <th>Name</th>
                                            <th>Permission</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th class="no-sort" style="width:80px">Action</th>
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
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x=1;@endphp
                                        @foreach($adminUsers as $adminUser)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            <td>{{ $adminUser->name }}</td>
                                            <td>{{ ($adminUser->is == 1) ? 'Admin':'Editor' }}</td>
                                            <td>{{ $adminUser->phone }}</td>
                                            <td>{{ $adminUser->email }}</td>
                                            <td>{{ $adminUser->address }}</td>
                                            <td class="text-center">
                                                <div class="form-button-action">
                                                    <a href="{{ route('admin-user.edit', $adminUser->id) }}" title="Edit" class="btn btn-link btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a data-route="" class="_delete"></a>

                                                    {{-- <a href="admin/users/destroy/{{$adminUser->id}}" data-toggle="tooltip" title="" class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a> --}}
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
</div>

{{-- <div class="modal fade" id="common-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="_delete_form">
                    <input type="hidden" name="_token" value="d5wcmp10oTixwsYnMlNx9hlS5byikfrMPrROe4cK">
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Password:</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}



<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                    Delete</span>
                    <span class="fw-light">
                        User
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="_delete_form">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <div class="modal-body">
                    {{-- <p class="small">Create a new row using this form, make sure you fill them all</p> --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password"  class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
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

        // $('#addRowButton').click(function() {
        //     $('#add-row').dataTable().fnAddData([
        //         $("#addName").val(),
        //         $("#addPosition").val(),
        //         $("#addOffice").val(),
        //         action
        //         ]);
        //     $('#deleteModal').modal('hide');

        // });
    });
</script>

{{-- <script>
    $(document).ready(function(){
        $(".delete_link").on('click', function(){
            var id = $(this).attr("rel");
            var delete_url = "";
            $(".modal_delete_link").attr("href", delete_url);
            $("#deleteModal").modal('show');
        });
    });
</script> --}}

<script>
    $(document).ready(function () {
        $('._delete')
            .addClass('fa fa-plus red')
            .css({
                "cursor" : "pointer"
            }).click(function (event) {

            $('#_delete_form').attr('action', $(event.target).data('route'));
            $('#deleteModal').modal('show');
        });
    });
</script>

@endpush
@endsection

