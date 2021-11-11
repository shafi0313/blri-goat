@extends('admin.layout.master')
@section('title', 'Community Farm')
@section('content')
@php $p='farmSett'; $sm='commCat'; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('farm.index')}}">Community Farm</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Add Community Farm</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- Page Content Start --}}
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Community Farm</h4>
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
                            <form action="{{ route('community-cat.update',$communityCat->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ $communityCat->user->id}}" name="user_id">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="name">Owner Name <span class="t_r">*</span></label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $communityCat->user->name }}" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="phone">Phone<span class="t_r">*</span></label>
                                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" oninput="this.value = this.value.replace(/[a-zA-z\-*/]/g,'');" value="{{ $communityCat->user->phone }}" required>
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="email">Email <span class="t_r">*</span></label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $communityCat->user->email }}" required>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="community_name">Community Farm Name <span class="t_r">*</span></label>
                                        <input type="text" class="form-control @error('community_name') is-invalid @enderror" name="community_name" value="{{ $communityCat->name }}" required>
                                        @error('community_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">District <span class="t_r">*</span></label>
                                        <select name="district_id" id="district_id" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($districts as $district)
                                            <option {{$district->id==$communityCat->district_id?'selected':''}} value="{{$district->id}}">{{$district->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Upazila <span class="t_r">*</span></label>
                                        <select name="upazila_id" id="upazila" class="form-control">
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Address <span class="t_r">*</span></label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$communityCat->address}}" required>
                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Password <span class="t_r">*</span></label>
                                        <input name="password" type="password" class="form-control @error('email') is-invalid @enderror" value="{{old('password')}}">
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label>Confirm Password <span class="t_r">*</span></label>
                                        <input name="password_confirmation" type="password" class="form-control @error('email') is-invalid @enderror" value="{{old('password')}}">
                                        @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="image" class="placeholder">Owner Photo</label>
                                        <input id="image" name="image" type="file" class="form-control">
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
    $('#preCal').click(function(){
        $('#cal').slideToggle()
    })


    $('#district_id').on('change',function(e) {
            var district_id = $('#district_id').val();
            // var cat_id = $('#product_id').val();
            $.ajax({
                url:'{{ route("get.upazila") }}',
                type:"get",
                data: {district_id: district_id},
                success:function (res) {
                    res = $.parseJSON(res);
                    $('#upazila').html(res.dis);
                }
            })
        });
</script>
@endpush
@endsection

