@extends('admin.layout.master')
@section('title', 'Disease Incidence Report')
@section('content')
@php $p='sales'; $sm="salesLedger"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard')}}" title="Dashboard"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    {{-- <li class="nav-item"><a href="{{ route('purchaseLedgerBook.index') }}">Disease Incidence Report</a></li> --}}
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Select Date</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Select Date</h4>
                            </div>
                        </div> --}}
                        <div class="card-body" >
                            <h1 class="text-center mr-5 mb-3">Select the date and show the report</h1>
                            <hr>
                            <form action="{{ route('report.disease.report') }}" method="post">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Animal Category</label>
                                            <select name="animal_cat_id" class="form-control" id="animal_cat_id">
                                              <option>Select</option>
                                              @foreach ($animalCats as $animalCat)
                                                <option value="{{ $animalCat->id }}">{{ $animalCat->name }}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Animal Sub Category</label>
                                            <select name="animal_sub_cat_id" class="form-control" id="animal_sub_cat"></select>
                                          </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="form_date" class="col-sm-2 col-form-label">Form Date:</label>
                                            <div class="col-sm-4">
                                            <input type="date" name="form_date" class="form-control" id="form_date" placeholder="Email">
                                            </div>

                                            <label for="to_date" class="col-sm-2 col-form-label">To Date:</label>
                                            <div class="col-sm-4">
                                            <input type="date" name="to_date" class="form-control" id="to_date" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-2" style="margin-top: 10px">
                                        <button type="submit" class="btn btn-primary" style="width: 200px">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom_scripts')
<script>
    $('#animal_cat_id').on('change',function(e) {
        var animal_cat_id = $('#animal_cat_id').val();
        $.ajax({
            url:'{{ route("animalSubCat") }}',
            type:"get",
            data: {
                animal_cat_id: animal_cat_id
                },
            success:function (res) {
                res = $.parseJSON(res);
                $('#animal_sub_cat').html(res.name);
            }
        })
    });
</script>
@endpush
@endsection

