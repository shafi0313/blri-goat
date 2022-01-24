@extends('admin.layout.master')
@section('title', 'Service')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@php $p='animalRecord'; $sm="service"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('service.index')}}">Service</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Edit Service</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- Page Content Start --}}
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Edit</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('service.update', $data->id)}}" method="post">
                                @csrf @method('PUT')
                                <div class="row">
                                    {{-- <div class="form-group col-md-3">
                                        <label for="name">Animal Tag <span class="t_r">*</span></label>
                                        <select name="animal_info_id" id="animalInfo" class="form-control @error('animal_info_id') is-invalid @enderror">
                                            <option value="">Select</option>
                                            @foreach ($animalInfos as $animalInfo)
                                            <option value="{{$animalInfo->id}}">{{$animalInfo->animal_tag}}</option>
                                            @endforeach
                                        </select>
                                        @error('animal_info_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group col-md-3">
                                        <label for="buck_tag">Buck Tag <span class="t_r">*</span></label>
                                        <select class="buck_tag form-control" id="" name="buck_tag">
                                            <option >Select</option>
                                            @foreach ($animalInfosM as $animalInfoM)
                                                <option value="{{ $animalInfoM->id }}" {{$data->buck_tag==$animalInfoM->id?'selected':''}}>{{ $animalInfoM->animal_tag }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="doe_tag">Doe Tag <span class="t_r">*</span></label>
                                        <select class="doe_tag form-control" id="" name="doe_tag">
                                            <option >Select</option>
                                            @foreach ($animalInfosF as $animalInfoF)
                                                <option value="{{ $animalInfoF->id }}" {{$data->doe_tag==$animalInfoF->id?'selected':''}}>{{ $animalInfoF->animal_tag }} => {{ $animalInfoF->dam }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="date_of_service">Date of Service <span class="t_r">*</span></label>
                                        <input  name="date_of_service" type="date" id="date_of_service" class="form-control @error('date_of_service') is-invalid @enderror" value="{{$data->date_of_service}}">
                                        @error('date_of_service')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="natural">Natural/AI <span class="t_r">*</span></label>
                                        <select name="natural" type="text" class="form-control @error('natural') is-invalid @enderror">
                                            <option value="">Select</option>
                                            <option value="Natural" {{$data->natural=="Natural"?'selected':''}}>Natural</option>
                                            <option value="AI" {{$data->natural=="AI"?'selected':''}}>AI</option>
                                        </select>
                                        @error('natural')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div align="center" class="mr-auto card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </form>
                        </div>
                    {{-- Page Content End --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('custom_scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.doe_tag').select2();
        $('.buck_tag').select2();
    });

    // $(document).ready(function() {
    //     $('.buck_tag').select2();
    // });
</script>
<script>
    // var date_of_service = $("#date_of_service").val()
    $(document).ready(function () {
            $("#date_of_service").change(function () {
                var addDays = 145;
                var startDateVal = $("#date_of_service").val();
                var ModifyInDate = new Date(setDateFormat(startDateVal));
                var NewDate = ModifyInDate.setDate(ModifyInDate.getDate() + parseInt(addDays));
                NewDate = new Date(NewDate);
                if (NewDate != "Invalid Date")
                    $("#expected_d_o_b").val(setDateFormat(NewDate));
            });
        });
        //This function is used for set date formate
        function setDateFormat(date) {
            DateObj = new Date(date);
            var day = DateObj.getDate() ;
            var month = DateObj.getMonth();
            var fullYear = DateObj.getFullYear().toString();
            var setformattedDate = '';
            setformattedDate = getDigitToFormat(day) + '/' +  getDigitToFormat(month) + '/' + fullYear;
            return setformattedDate;
        }
        function getDigitToFormat(val) {
            if (val < 10) {
                val = '0' + val;
            }
            return val.toString();
        }



    $("#date_of_service").on('change', function(){



        var date_of_service = $.datepicker.formatDate('yy/mm/dd', new Date($("#date_of_service").val()))+50;
        $("#expected_d_o_b").val(date_of_service)
        // alert();
        // alert(sessionBirth)
    });
</script>
<script>
    $('#animalInfo').on('change',function(e) {
        var animalInfoId = $(this).val();
        $.ajax({
            url:'{{ route("get.getAnimalInfo") }}',
            type:"get",
            data: {
                animalInfoId: animalInfoId
                },
            success:function (res) {
                res = $.parseJSON(res);
                $('#sex').val(res.sex);
                $('#color').val(res.color);
                $('#birth_wt').val(res.birth_wt);
                $('#type').val(res.type);
                $('#paity').val(res.paity);
                $('#litter_size').val(res.litter_size);
            }
        })
    });
</script>
@endpush
@endsection

