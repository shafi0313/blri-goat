@extends('admin.layout.master')
@section('title', 'Milk Production')
@section('content')
@php $p='animalRecord'; $sm="milkProduction"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('milk-production.index')}}">Milk Production</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Add Milk Production</li>
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
                            <form action="{{ route('milk-production.store')}}" method="post">
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

                                    {{-- <div class="form-group col-md-3">
                                        <label for="">Goat Color <span class="t_r">*</span></label>
                                        <input type="text" class="form-control"  id="color" value="" readonly>
                                    </div> --}}

                                    {{-- <div class="form-group col-md-3">
                                        <label for="">Birth Wt. (Kg) <span class="t_r">*</span></label>
                                        <input type="text" class="form-control" id="birth_wt" readonly>
                                    </div> --}}

                                    {{-- <div class="form-group col-md-3">
                                        <label for="">Parity number <span class="t_r">*</span></label>
                                        <input type="text" class="form-control" id="paity" readonly>
                                    </div> --}}

                                    {{-- <div class="form-group col-md-3">
                                        <label for="">Litter Size <span class="t_r">*</span></label>
                                        <input type="text" class="form-control" id="litter_size" readonly>
                                    </div> --}}

                                    <div class="form-group col-md-3">
                                        <label for="parity_number">Parity number <span class="t_r">*</span></label>
                                        <input name="parity_number" type="number" class="form-control @error('parity_number') is-invalid @enderror" id="paity" required>
                                        @error('parity_number')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="litter_size">Litter Size <span class="t_r">*</span></label>
                                        <input name="litter_size" type="text" class="form-control @error('litter_size') is-invalid @enderror" id="litter_size" required>
                                        @error('litter_size')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="date_of_milking">Date of Milking <span class="t_r">*</span></label>
                                        <input name="date_of_milking" type="date" class="form-control @error('date_of_milking') is-invalid @enderror" value="{{old('date_of_milking')}}" required>
                                        @error('date_of_milking')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="milk_production">Milk Production (ml) <span class="t_r">*</span></label>
                                        <input name="milk_production" type="number" step="any" class="form-control @error('milk_production') is-invalid @enderror" value="{{old('milk_production')}}" required>
                                        @error('milk_production')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <div class="form-group col-md-3">
                                        <label for="average_milk_production">Average milk production (ml) <span class="t_r">*</span></label>
                                        <input name="average_milk_production" type="number" step="any" class="form-control @error('average_milk_production') is-invalid @enderror" value="{{old('average_milk_production')}}" required>
                                        @error('average_milk_production')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group col-md-3">
                                        <label for="lactation_length">Lactation length (day) <span class="t_r">*</span></label>
                                        <input name="lactation_length" type="number" step="any" class="form-control @error('lactation_length') is-invalid @enderror" value="{{old('lactation_length')}}" required>
                                        @error('lactation_length')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="milk_yield">Milk yield/ lactation <span class="t_r">*</span></label>
                                        <input name="milk_yield" type="number" step="any" class="form-control @error('milk_yield') is-invalid @enderror" value="{{old('milk_yield')}}" required>
                                        @error('milk_yield')
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
                $('#paity').val(res.paity);
                $('#litter_size').val(res.litter_size);
            }
        })
    });
</script>
@endpush
@endsection

