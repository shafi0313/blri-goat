@extends('admin.layout.master')
@section('title', 'Production Record')
@section('content')
@php $p='animalForm'; $sm="proRecord"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                    <a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Production Record</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                {{-- <h4 class="card-title">Production Record</h4> --}}
                                {{-- <a href="{{route('production-record.create')}}" class="btn btn-primary btn-round ml-auto text-light"><i class="fa fa-plus"></i> Add New</a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="m-auto" style="width: 800px !important">
                                <div class="text-center">
                                    <h3>ছাগল ও ভেড়া উৎপাদন গবেষণা বিভাগ</h3>
                                    <h4>বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট</h4>
                                    <h4>সাভার, ঢাকা</h4>
                                    <h4>Form: {{Carbon\Carbon::parse($form_date)->format('d/m/Y')}} To: {{Carbon\Carbon::parse($to_date)->format('d/m/Y')}}</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead class="">
                                            <tr class="text-center">
                                                <th style="width: 35px">ক্রমিক নং</th>
                                                <th>গ্রুপ</th>
                                                <th>ব্লাক বেঙ্গল</th>
                                                <th>যমুনাপাড়ি</th>
                                                <th>বোয়ার</th>
                                                <th>যমুনাপাড়ি × ব্লাক বেঙ্গল</th>
                                                <th>বোয়ার × যমুনাপাড়ি</th>
                                                <th>সর্বমোট</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td colspan="8">১. পাঠাঁ</td>
                                            </tr>
                                            <tr style="margin-left: 10px">
                                                <td>১.১</td>
                                                <td>প্রজননক্ষম পাঁঠা</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>১.২</td>
                                                <td>বাড়ন্ত পাঁঠা</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>১.৩</td>
                                                <td>খাঁসী</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>১.৪</td>
                                                <td>পাঁঠা বাচ্চা</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-right font-weight-bold">মোট</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="8"></td>
                                            </tr>
                                            <tr>
                                                <td>২.১</td>
                                                <td>প্রজননক্ষম ছাগী</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>২.২</td>
                                                <td>বাড়ন্ত ছাগী</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>২.৩</td>
                                                <td>ছাগী বাচ্চা</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-right font-weight-bold">মোট</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-right font-weight-bold">সর্বমোট</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-right font-weight-bold">পূর্বের স্টক</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>৩.</td>
                                                <td>চলতি মাসে মোট জন্ম (পাঁঠা + ছাগী)</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>৪.</td>
                                                <td>চলতি মাসে মোট মৃত্যু (পাঁঠা + ছাগী)</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>৫.</td>
                                                <td>চলতি মাসে মোট ছাটাই (পাঁঠা + ছাগী)</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="row mb-5">
                                    <div class="col text-center">
                                        <span>মো: জাহাংগীর হোসেন</span><br>
                                        <span>ল্যাবরেটরী  টেকনিশিয়ান</span>
                                    </div>
                                    <div class="col text-center">
                                        <span>নূরে হাছনি দিশা</span><br>
                                        <span>বৈজ্ঞানিক কর্মকর্তা</span>
                                    </div>
                                    <div class="col text-center">
                                        <span>মো: আবু হেমায়েত</span><br>
                                        <span>বৈজ্ঞানিক কর্মকর্তা</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
