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
                            <form action="{{ route('farm.store')}}" method="post">
                                @csrf
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
                                        <label for="name">Farm <span class="t_r">*</span></label>
                                        <select name="" class="form-control @error('name') is-invalid @enderror">
                                            <option value="">Select</option>
                                            @foreach ($farms as $farm)
                                            <option value="{{$farm->id}}">{{$farm->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3 community" style="display: none">
                                        <label for="name">Community Name <span class="t_r">*</span></label>
                                        <select name="" id="community_cat" class="form-control @error('name') is-invalid @enderror">
                                            <option value="">Select</option>
                                            @foreach ($communityCats as $communityCat)
                                            <option value="{{$communityCat->id}}">{{$communityCat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3 community" style="display: none">
                                        <label for="name">Sub Farm <span class="t_r">*</span></label>
                                        <select name="" id="comm" class="form-control"></select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label for="name">Sire <span class="t_r">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="name">Dam <span class="t_r">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="name">Goat Tag <span class="t_r">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="name">Coat Color </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="name">Sex <span class="t_r">*</span></label>
                                        <select name="" class="form-control @error('name') is-invalid @enderror">
                                            <option value="" selected disabled>Select</option>
                                            <option value="">Male</option>
                                            <option value="">Female</option>
                                        </select>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="name">Birth Weight (Kg) <span class="t_r">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="name">Litter Size <span class="t_r">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="name">Generation <span class="t_r">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="name">Parity </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="name">Dam milk production (ml) </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="name">Date of Birth <span class="t_r">*</span></label>
                                        <input type="date" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="name">Season of Birth </label>
                                        <input type="date" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="name">Date of Culling/ Death </label>
                                        <input type="date" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group col-md-8">
                                        <label for="name">Remarks <span class="t_r">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                        @error('name')
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
    })
    $('#community').click(function(){
        $('#farmSelect').fadeOut()
        $('.community').fadeIn()
    })

    $('#community_cat').on('change',function(e) {
            var communityCatId = $(this).val();
            // alert(communityCatId)
            $.ajax({
                url:'{{ route("animalInfo.getCommunity") }}',
                type:"get",
                data: {
                    communityCatId: communityCatId
                    },
                success:function (res) {
                    res = $.parseJSON(res);
                    // alert(res.com)
                    $('#comm').html(res.com);
                }
            })
        });
</script>
@endpush
@endsection

