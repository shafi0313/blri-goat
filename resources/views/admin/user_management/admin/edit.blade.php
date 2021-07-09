@extends('admin.layout.master')
@section('title', 'Admin')
@section('content')
@php $p='tools'; $sm="userCreate"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('admin-user.index')}}">Admin</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Edit Admin</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- Page Content Start --}}
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Edit Admin</h4>
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
                            <form action="{{ route('admin-user.update', $adminUsers->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="business_name">Permission <span class="t_r">*</span></label>
                                        <select name="is_" id="" class="form-control @error('is_') is-invalid @enderror">
                                            {{-- <option selected value disabled>Select</option> --}}
                                            <option value="1" {{($adminUsers->id=='1')?'selected':''}}>Admin</option>
                                            {{-- <option value="2" {{($adminUsers->id=='2')?'selected':''}}>Editor</option>
                                            <option value="3" {{($adminUsers->id=='3')?'selected':''}}>Viewer</option> --}}
                                        </select>
                                        @error('is_')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="name">Name <span class="t_r">*</span></label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$adminUsers->name}}" placeholder="Enter Admin Name" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="phone">Phone<span class="t_r">*</span></label>
                                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$adminUsers->phone}}" placeholder="Enter Phone" required>
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="email">Email <span class="t_r">*</span></label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$adminUsers->email}}" placeholder="Enter Email" required>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label>Password <span class="t_r">*</span></label>
                                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{$adminUsers->password}}" required>
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label>Confrim Password <span class="t_r">*</span></label>
                                        <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{$adminUsers->password}}" required>
                                        @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                                <hr class="bg-warning">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="address">Address <span class="t_r">*</span></label>
                                        <textarea name="address" id="" cols="15" rows="6" class="form-control @error('address') is-invalid @enderror"  placeholder="Enter Mailing Address" required>{{$adminUsers->address}}</textarea>
                                        {{-- <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}" placeholder="Enter Address" required> --}}
                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="bg-warning">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <img src="{{asset('files/images/user/'.$adminUsers->profile_photo_path)}}" alt="">
                                        <input id="image" name="oldImage" type="hidden" value="{{$adminUsers->profile_photo_path}}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="image" class="placeholder">Photo</label>
                                        <input id="image" name="image" type="file" class="form-control">
                                    </div>
                                </div>


                                {{-- File --}}
                                <div class="row col-md-12"><h3 style="margin-left: 8px; font-weight:bold">Documents</h3></div>
                                <table class="table table-bordered">
                                    {{-- <h2>Documents</h2> --}}
                                    <tr>
                                        <th style="width:250px">File</th>
                                        <th>Note</th>
                                        <th style="width: 20px;text-align:center;">
                                            <button class="btn btn-info btn-sm" style="padding: 4px 13px"><i class="fas fa-mouse"></i></button>
                                        </th>
                                    </tr>

                                    <tr>
                                        <td><input type="file" name="name[]" multiple id="document_1" class="form-control form-control-sm" style="width:250px"/></td>
                                        <td><input type="text" name="note[]"          id="qty_1"           class="form-control form-control-sm" placeholder="Note"/></td>
                                        <td style="width: 20px"><span class="btn btn-sm btn-success addrow"><i class="fa fa-plus" aria-hidden="true"></i></span></td>
                                    </tr>
                                    <tbody id="showItem"></tbody>
                                </table>

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
</script>
@endpush
@endsection

