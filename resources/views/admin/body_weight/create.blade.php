@extends('admin.layout.master')
@section('title', 'Body Weight')
@section('content')
@php $p='animalRecord'; $sm="production"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('body-weight.index')}}">Body Weight</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Add Body Weight</li>
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
                            <form action="{{ route('body-weight.store')}}" method="post">
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

                                    {{-- <div class="form-group col-md-3">
                                        <label for="">Goat Color <span class="t_r">*</span></label>
                                        <input type="text" class="form-control"  id="color" value="" readonly>
                                    </div> --}}

                                    <div class="form-group col-md-3">
                                        <label for="">Birth Wt. (Kg) <span class="t_r">*</span></label>
                                        <input type="text" class="form-control" name="birth_wt" id="birth_wt" readonly>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="month_1">1 months body wt. (kg)</label>
                                        <input type="number" step="any" class="form-control @error('month_1') is-invalid @enderror" name="month_1" id="month_1">
                                        @error('month_1')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="month_2">2 months body wt. (kg)</label>
                                        <input type="number" step="any" class="form-control @error('month_2') is-invalid @enderror" name="month_2" id="month_2">
                                        @error('month_2')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="month_3">3 months body wt. (kg)</label>
                                        <input type="number" step="any" class="form-control @error('month_3') is-invalid @enderror" name="month_3" id="month_3">
                                        @error('month_3')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="month_4">4 months body wt. (kg)</label>
                                        <input type="number" step="any" class="form-control @error('month_4') is-invalid @enderror" name="month_4" id="month_4">
                                        @error('month_4')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="month_5">5 months body wt. (kg)</label>
                                        <input type="number" step="any" class="form-control @error('month_5') is-invalid @enderror" name="month_5" id="month_5">
                                        @error('month_5')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="month_6">6 months body wt. (kg)</label>
                                        <input type="number" step="any" class="form-control @error('month_6') is-invalid @enderror" name="month_6" id="month_6">
                                        @error('month_6')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="month_7">7 months body wt. (kg)</label>
                                        <input type="number" step="any" class="form-control @error('month_7') is-invalid @enderror" name="month_7" id="month_7">
                                        @error('month_7')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="month_8">8 months body wt. (kg)</label>
                                        <input type="number" step="any" class="form-control @error('month_8') is-invalid @enderror" name="month_8" id="month_8">
                                        @error('month_8')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="month_9">9 months body wt. (kg)</label>
                                        <input type="number" step="any" class="form-control @error('month_9') is-invalid @enderror" name="month_9" id="month_9">
                                        @error('month_9')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="month_10">10 months body wt. (kg)</label>
                                        <input type="number" step="any" class="form-control @error('month_10') is-invalid @enderror" name="month_10" id="month_10">
                                        @error('month_10')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="month_11">11 months body wt. (kg)</label>
                                        <input type="number" step="any" class="form-control @error('month_11') is-invalid @enderror" name="month_11" id="month_11">
                                        @error('month_11')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="month_12">12 months body wt. (kg)</label>
                                        <input type="number" step="any" class="form-control @error('month_12') is-invalid @enderror" name="month_12" id="month_12">
                                        @error('month_12')
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
    @include('admin.layout.footer')
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


<script>
    $('#animalInfo').on('change',function(e) {
        var animalInfoId = $(this).val();
        $.ajax({
            url:'{{ route("get.bodyWeight") }}',
            type:"get",
            data: {
                animalInfoId: animalInfoId
                },
            success:function (res) {
                res = $.parseJSON(res);
                $('#month_1').val(res.month_1);
                $('#month_2').val(res.month_2);
                $('#month_3').val(res.month_3);
                $('#month_4').val(res.month_4);
                $('#month_5').val(res.month_5);
                $('#month_6').val(res.month_6);
                $('#month_7').val(res.month_7);
                $('#month_8').val(res.month_8);
                $('#month_9').val(res.month_9);
                $('#month_10').val(res.month_10);
                $('#month_11').val(res.month_11);
                $('#month_12').val(res.month_12);
            }
        })
    });
</script>
@endpush
@endsection

