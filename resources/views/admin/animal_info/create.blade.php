@extends('admin.layout.master')
@section('title', 'Animal Information')
@php $p='animalRecord'; $sm="animalInfo"; @endphp
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('animal-info.index')}}">Animal Information</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Add Animal Information</li>
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
                            <form action="{{ route('animal-info.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-check">
										<label>Select <span class="t_r">*</span></label><br>
										<label class="form-radio-label" id="farm">
											<input class="form-radio-input" type="radio" name="optionsRadios" value="" >
											<span class="form-radio-sign">Research Farm</span>
										</label>
										<label class="form-radio-label ml-3" id="community">
											<input class="form-radio-input" type="radio" name="optionsRadios" value="">
											<span class="form-radio-sign">Community Farm</span>
										</label>
									</div>


                                    <div class="form-group col-md-3" id="farmSelect" style="display: none">
                                        <label for="farm_id">Farm <span class="t_r">*</span></label>
                                        <select name="farm_id" class="form-control @error('name') is-invalid @enderror" id="farm_id">
                                            <option value="">Select</option>
                                            @foreach ($farms as $farm)
                                            <option value="{{$farm->id}}">{{$farm->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('farm_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3 community" style="display: none">
                                        <label for="community_id">Community Name <span class="t_r">*</span></label>
                                        <select name="community_cat_id" id="community_cat" class="form-control @error('name') is-invalid @enderror">
                                            <option value="">Select</option>
                                            @foreach ($communityCats as $communityCat)
                                            <option value="{{$communityCat->id}}">{{$communityCat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('community_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3 community" style="display: none">
                                        <label for="name">Sub Farm <span class="t_r">*</span></label>
                                        <select name="community_id" id="comm" class="form-control"></select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-check col-md-3">
										<label>Type <span class="t_r">*</span></label><br>
										<label class="form-radio-label" id="goat">
											<input class="form-radio-input" type="radio" name="type" value="1" required>
											<span class="form-radio-sign">Goat</span>
										</label>
										<label class="form-radio-label ml-3" id="sheep">
											<input class="form-radio-input" type="radio" name="type" value="2" required>
											<span class="form-radio-sign">Sheep</span>
										</label>
									</div>

                                    <div class="form-group col-md-3 goatCat" style="display: none">
                                        <label for="sire">Goat Category <span class="t_r">*</span></label>
                                        <select name="animal_cat_id" id="" class="form-control animal goat @error('sire') is-invalid @enderror">
                                            <option >Select</option>
                                            @foreach ($goatCats as $goatCat)
                                            <option value="{{$goatCat->id}}">{{$goatCat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('sire')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3 goatCat" style="display: none">
                                        <label for="sire">Goat Sub Category *</span></label>
                                        <select name="animal_sub_cat_id" id="" class="form-control animalSub goat @error('sire') is-invalid @enderror"></select>
                                    </div>

                                    <div class="form-group col-md-3 sheepCat" style="display: none">
                                        <label for="sire">Sheep Category <span class="t_r">*</span></label>
                                        <select name="animal_cat_id" id="" class="form-control animal sheep @error('sire') is-invalid @enderror">
                                            <option>Select</option>
                                            @foreach ($sheepCats as $sheeptCat)
                                            <option value="{{$sheeptCat->id}}">{{$sheeptCat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('sire')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3 sheepCat" style="display: none">
                                        <label for="sire">Sheep Sub Category </label>
                                        <select name="animal_sub_cat_id" id="" class="form-control animalSub sheep @error('sire') is-invalid @enderror"></select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="sex">Sex <span class="t_r">*</span></label>
                                        <select name="sex" id="sex" class="form-control @error('sex') is-invalid @enderror" required>
                                            <option  selected disabled>Select</option>
                                            <option value="M">M</option>
                                            <option value="F">F</option>
                                        </select>
                                        @error('sex')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-check col-md-3" id="m_type" style="display: none">
										<label>M Type <span class="t_r">*</span></label><br>
										<label class="form-radio-label" id="patha">
											<input class="form-radio-input" type="radio" name="m_type" value="1">
											<span class="form-radio-sign">patha</span>
										</label>
										<label class="form-radio-label ml-3" id="khasi">
											<input class="form-radio-input" type="radio" name="m_type" value="2">
											<span class="form-radio-sign">Khasi</span>
										</label>
									</div>

                                    {{-- <div class="form-group col-md-3">
                                        <label for="a_type">Type <span class="t_r">*</span></label>
                                        <select name="a_type" class="form-control @error('a_type') is-invalid @enderror">
                                            <option selected disabled>Select</option>
                                            <option value="1">প্রজননক্ষম</option>
                                            <option value="2">বাড়ন্ত</option>
                                            <option value="3">বাচ্চা</option>
                                        </select>
                                        @error('a_type')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group col-md-3">
                                        <label for="sire">Sire <span class="t_r">*</span></label>
                                        <input name="sire" type="text" class="form-control @error('sire') is-invalid @enderror"  value="{{old('sire')}}" required>
                                        @error('sire')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="dam">Dam <span class="t_r">*</span></label>
                                        <input name="dam" type="text" class="form-control @error('dam') is-invalid @enderror" value="{{old('dam')}}" required>
                                        @error('dam')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="animal_tag">Animal Tag <span class="t_r">*</span></label>
                                        <input name="animal_tag" type="text" class="form-control @error('animal_tag') is-invalid @enderror" value="{{old('animal_tag')}}" required>
                                        @error('animal_tag')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="color">Animal Color </label>
                                        <input name="color" type="text" class="form-control @error('color') is-invalid @enderror" value="{{old('color')}}">
                                        @error('color')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="birth_wt">Birth Weight (Kg) <span class="t_r">*</span></label>
                                        <input name="birth_wt" type="text" class="form-control @error('birth_wt') is-invalid @enderror" value="{{old('birth_wt')}}" required>
                                        @error('birth_wt')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="litter_size">Litter Size <span class="t_r">*</span></label>
                                        <input name="litter_size" type="text" class="form-control @error('litter_size') is-invalid @enderror" value="{{old('litter_size')}}" required>
                                        @error('litter_size')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="generation">Generation <span class="t_r">*</span></label>
                                        <input name="generation" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('generation')}}" required>
                                        @error('generation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="paity">Parity </label>
                                        <input name="paity" type="text" class="form-control @error('paity') is-invalid @enderror" value="{{old('paity')}}">
                                        @error('paity')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="dam_milk">Dam milk production (ml) </label>
                                        <input  name="dam_milk" type="text" class="form-control @error('dam_milk') is-invalid @enderror" value="{{old('dam_milk')}}">
                                        @error('dam_milk')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="d_o_b">Date of Birth <span class="t_r">*</span></label>
                                        <input  name="d_o_b" id="d_o_b" type="date" class="form-control @error('d_o_b') is-invalid @enderror" value="{{old('d_o_b')}}" required>
                                        @error('d_o_b')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="season_d_o_b">Season of Birth </label>
                                        <input name="season_d_o_b" id="season_d_o_b" type="text" class="form-control @error('season_d_o_b') is-invalid @enderror" readonly>
                                        @error('season_d_o_b')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="death_date">Date of Culling/ Death </label>
                                        <input type="date" class="form-control @error('death_date') is-invalid @enderror" name="death_date" value="{{old('death_date')}}">
                                        @error('death_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group col-md-8">
                                        <label for="remark">Remarks <span class="t_r">*</span></label>
                                        <input name="remark" type="text" class="form-control @error('remark') is-invalid @enderror" value="{{old('remark')}}" required>
                                        @error('remark')
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
    // farm
    $('#farm').click(function(){
        $('#farmSelect').fadeIn()
        $('.community').fadeOut()
        $('#farm_id').attr('required', true)
        $("[name='community_id']").attr('required', false)
        $("[name='name']").attr('required', false)
    })
    $('#community').click(function(){
        $('#farmSelect').fadeOut()
        $('.community').fadeIn()
        $('#farm_id').attr('required', false)
        $("[name='community_id']").attr('required', true)
        $("#comm").attr('required', true)
    })

    $('#sex').on('change',function(e) {
        var sex = $(this).val();
        if(sex=='M'){
            $('#m_type').show()
        }else{
            $('#m_type').hide()
        }
    })

    $('#community_cat').on('change',function(e) {
        var communityCatId = $(this).val();
        $.ajax({
            url:'{{ route("animalInfo.getCommunity") }}',
            type:"get",
            data: {
                communityCatId: communityCatId
                },
            success:function (res) {
                res = $.parseJSON(res);
                $('#comm').html(res.com);
            }
        })
    });

    // Animal Cat
    $('#goat').click(function(){
        $('.sheep').val('')
        $('.goat').val('')
    })
    $('#goat').click(function(){
        $('.goatCat').fadeIn()
        $('.sheepCat').fadeOut()
        $('.sheep').attr('disabled', true)
        $('.goat').attr('disabled', false)
        $('.goat').attr('required', true)
        $('.sheep').attr('required', false)
    })

    $('#sheep').click(function(){
        $('.sheepCat').fadeIn()
        $('.goatCat').fadeOut()
        $('.goat').attr('disabled', true)
        $('.sheep').attr('disabled', false)
        $('.sheep').attr('required', true)
        $('.goat').attr('required', false)
    })

    $('.animal').on('change',function(e) {
        var animalCatId = $(this).val();
        $.ajax({
            url:'{{ route("animalInfo.getAnimalCat") }}',
            type:"get",
            data: {
                animalCatId: animalCatId
                },
            success:function (res) {
                res = $.parseJSON(res);
                $('.animalSub').html(res.animal);
            }
        })
    });

    $("#d_o_b").on('change', function(){
        var sessionBirthCal;
        var sessionBirth = new Date($("#d_o_b").val()).getMonth()+1;
        if(sessionBirth==3 || sessionBirth==4 || sessionBirth==5 || sessionBirth==6){
            sessionBirthCal = 'Summer';
        }else if(sessionBirth==7 || sessionBirth==8 || sessionBirth==9 || sessionBirth==10){
            sessionBirthCal = 'Raing';
        }else{
            sessionBirthCal = 'Winter';
        }
        $('#season_d_o_b').val(sessionBirthCal);



    })

</script>
@endpush
@endsection

