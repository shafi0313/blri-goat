@extends('admin.layout.master')
@section('title', 'Service')
@section('content')
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
                    <li class="nav-item active">Add Service</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- Page Content Start --}}
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add New</h4>
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
                            <form action="{{ route('service.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-3">
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
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Sex <span class="t_r">*</span></label>
                                        <input type="text" class="form-control" id="sex"  value="" readonly>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="name">Buck Tag</label>
                                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="name">Dou Tag</label>
                                        <input  name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="date_of_service">Date of Service</label>
                                        <input  name="date_of_service" type="date" id="date_of_service" class="form-control @error('date_of_service') is-invalid @enderror" value="{{old('date_of_service')}}">
                                        @error('date_of_service')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <div class="form-group col-md-3">
                                        <label for="expected_d_o_b">Expected Date of Birth</label>
                                        <input  name="expected_d_o_b" type="text" id="expected_d_o_b" class="form-control @error('expected_d_o_b') is-invalid @enderror" value="{{old('expected_d_o_b')}}">
                                        @error('expected_d_o_b')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group col-md-3">
                                        <label for="natural">Natural/AI</label>
                                        <input  name="natural" type="text" class="form-control @error('natural') is-invalid @enderror" value="{{old('natural')}}">
                                        @error('natural')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
{{-- 
                                    <div class="form-group col-md-3">
                                        <label for="repeat_heat">Repeat Heat/not</label>
                                        <input  name="repeat_heat" type="text" class="form-control @error('repeat_heat') is-invalid @enderror" value="{{old('repeat_heat')}}">
                                        @error('repeat_heat')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
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

