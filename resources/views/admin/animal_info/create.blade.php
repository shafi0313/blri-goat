@extends('admin.layout.master')
@section('title', 'Animal Information')
@section('content')
@php $p='tools'; $sm="userCreate"; @endphp
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
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <div class="row">
                                    <div class="form-check">
										<label>Select <span class="t_r">*</span></label><br>
										<label class="form-radio-label" id="farm">
											<input class="form-radio-input" type="radio" name="optionsRadios" value="" >
											<span class="form-radio-sign">Farm</span>
										</label>
										<label class="form-radio-label ml-3" id="community">
											<input class="form-radio-input" type="radio" name="optionsRadios" value="">
											<span class="form-radio-sign">Community</span>
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
                                        <select name="community_id" id="community_cat" class="form-control @error('name') is-invalid @enderror">
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
                                        <select name="" id="comm" class="form-control"></select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-check col-md-3">
										<label>Type <span class="t_r">*</span></label><br>
										<label class="form-radio-label" id="farm">
											<input class="form-radio-input" type="radio" name="type" value="1" required>
											<span class="form-radio-sign">Goat</span>
										</label>
										<label class="form-radio-label ml-3" id="community">
											<input class="form-radio-input" type="radio" name="type" value="2" required>
											<span class="form-radio-sign">Sheep</span>
										</label>
									</div>

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
                                        <label for="color">Coat Color </label>
                                        <input name="color" type="text" class="form-control @error('color') is-invalid @enderror" value="{{old('color')}}">
                                        @error('color')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="sex">Sex <span class="t_r">*</span></label>
                                        <select name="sex" class="form-control @error('sex') is-invalid @enderror">
                                            <option value="" selected disabled>Select</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                        @error('sex')
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
                                        <input  name="d_o_b" type="date" class="form-control @error('d_o_b') is-invalid @enderror" value="{{old('d_o_b')}}" required>
                                        @error('d_o_b')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="season_d_o_b">Season of Birth </label>
                                        <input name="season_d_o_b" type="date" class="form-control @error('season_d_o_b') is-invalid @enderror" value="{{old('season_d_o_b')}}">
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
</script>
@endpush
@endsection

