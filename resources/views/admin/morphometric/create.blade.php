@extends('admin.layout.master')
@section('title', 'Morphometric')
@section('content')
@php $p='animalRecord'; $sm="morphometric"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('morphometric.index')}}">Morphometric</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Add Morphometric</li>
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
                            <form action="{{ route('morphometric.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="type" id="type">
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
                                        <label for="">Goat Color <span class="t_r">*</span></label>
                                        <input type="text" class="form-control"  id="color" value="" readonly>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Birth Wt. (Kg) <span class="t_r">*</span></label>
                                        <input type="text" class="form-control" id="birth_wt" readonly>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="age">Age</label>
                                        <input name="age" type="text" class="form-control @error('age') is-invalid @enderror" value="{{old('age')}}">
                                        @error('age')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="body_lenght">Body length (cm) <span class="t_r">*</span></label>
                                        <input name="body_lenght" type="number" step="any" class="form-control @error('body_lenght') is-invalid @enderror" value="{{old('body_lenght')}}">
                                        @error('body_lenght')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="weither_height">Weither height <span class="t_r">*</span></label>
                                        <input name="weither_height" type="number" step="any" class="form-control @error('weither_height') is-invalid @enderror" value="{{old('weither_height')}}">
                                        @error('weither_height')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="horn_pattern">Horn pattern </label>
                                        <input name="horn_pattern" type="text" class="form-control @error('horn_pattern') is-invalid @enderror" value="{{old('horn_pattern')}}">
                                        @error('horn_pattern')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="horn_length">Horn length </label>
                                        <input name="horn_length" type="number" step="any" class="form-control @error('horn_length') is-invalid @enderror" value="{{old('horn_length')}}">
                                        @error('horn_length')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="tail_length">Tail length <span class="t_r">*</span></label>
                                        <input name="tail_length" type="number" step="any" class="form-control @error('tail_length') is-invalid @enderror" value="{{old('tail_length')}}">
                                        @error('tail_length')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="ear_length">Ear length <span class="t_r">*</span></label>
                                        <input name="ear_length" type="number" step="any" class="form-control @error('ear_length') is-invalid @enderror" value="{{old('ear_length')}}">
                                        @error('ear_length')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="h_girth_length">H.girth length <span class="t_r">*</span></label>
                                        <input name="h_girth_length" type="number" step="any" class="form-control @error('h_girth_length') is-invalid @enderror" value="{{old('h_girth_length')}}">
                                        @error('h_girth_length')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="height_of_rump">Height of rump <span class="t_r">*</span></label>
                                        <input name="height_of_rump" type="number" step="any" class="form-control @error('height_of_rump') is-invalid @enderror" value="{{old('height_of_rump')}}">
                                        @error('height_of_rump')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="head_length">Head length <span class="t_r">*</span></label>
                                        <input name="head_length" type="number" step="any" class="form-control @error('head_length') is-invalid @enderror" value="{{old('head_length')}}">
                                        @error('head_length')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="eye_to_eye_length">Eye to eye length <span class="t_r">*</span></label>
                                        <input name="eye_to_eye_length" type="number" step="any" class="form-control @error('eye_to_eye_length') is-invalid @enderror" value="{{old('eye_to_eye_length')}}">
                                        @error('eye_to_eye_length')
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
            }
        })
    });
</script>
@endpush
@endsection

