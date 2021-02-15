@extends('admin.layout.master')
@section('title', 'Author')
@section('content')
@php $p='tools'; $sm="userCreate"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('admin-user.index')}}">Author</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Add Author</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- Page Content Start --}}
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Author</h4>
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
                            <form action="{{ route('employee.update', $employee->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-check col-sm-3">
										<label>Login Permission <span class="t_r">*</span></label><br>
										<label class="form-radio-label" id="permissionYes">
											<input class="form-radio-input" type="radio" name="permission" value="1" >
											<span class="form-radio-sign">Yes</span>
										</label>
										<label class="form-radio-label ml-3">
											<input class="form-radio-input" type="radio" name="permission" value="0" checked id="permissionNo">
											<span class="form-radio-sign">No</span>
										</label>
									</div>

                                    <div class="form-group col-sm-6">
                                        <div style="display: none" id="permissionShow">
                                            <label for="business_name">Permission <span class="t_r">*</span></label>
                                            <select name="is_" id="" class="form-control @error('is_') is-invalid @enderror" required>
                                                <option selected value disabled>Select</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Editor</option>
                                                <option value="3">Viewer</option>
                                            </select>
                                            @error('is_')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="tmm_so_id">Employee Id</label>
                                        <input type="text" name="tmm_so_id" class="form-control @error('tmm_so_id') is-invalid @enderror" value="{{$employee->tmm_so_id}}">
                                        @error('tmm_so_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="name">Employee Name <span class="t_r">*</span></label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$employee->name}}">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="f_name">Father Name <span class="t_r">*</span></label>
                                        <input type="text" name="f_name" class="form-control @error('f_name') is-invalid @enderror" value="{{$employee->employeeInfo->f_name}}" required>
                                        @error('f_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="m_name">Mother Name <span class="t_r">*</span></label>
                                        <input type="text" name="m_name" class="form-control @error('m_name') is-invalid @enderror" value="{{$employee->employeeInfo->m_name}}" required>
                                        @error('m_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="designation">Designation <span class="t_r">*</span></label>
                                        <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" value="{{$employee->employeeInfo->designation}}" required>
                                        @error('designation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="d_o_b">Date of Birth <span class="t_r">*</span></label>
                                        <input type="date" name="d_o_b" class="form-control @error('d_o_b') is-invalid @enderror" value="{{$employee->employeeInfo->d_o_b}}" required>
                                        @error('d_o_b')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-5">
                                        <label for="nid">NID <span class="t_r">*</span></label>
                                        <input type="text" name="nid" class="form-control @error('nid') is-invalid @enderror" value="{{$employee->employeeInfo->nid}}" required>
                                        @error('nid')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="phone">Phone <span class="t_r">*</span></label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$employee->phone}}" required>
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-2">
                                        <label for="blood">Blood Group </label>
                                        <input type="text" name="blood" class="form-control @error('blood') is-invalid @enderror" value="{{$employee->employeeInfo->blood}}">
                                        @error('blood')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-check col-sm-2">
										<label>Marital Status <span class="t_r">*</span></label><br>
										<select name="m_status" class="form-control @error('phone') is-invalid @enderror">
                                            <option selected disabled value >Select</option>
                                            <option value="1" {{($employee->employeeInfo->m_status =='1')?'selected':''}}>Married</option>
                                            <option value="2" {{($employee->employeeInfo->m_status =='2')?'selected':''}}>Unmarried</option>
                                        </select>
                                        @error('m_status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
									</div>

                                    <div class="form-group col-sm-5">
                                        <label for="email">Email <span class="t_r">*</span></label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$employee->email}}" required>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="c_phone">Company Phone </label>
                                        <input type="text" name="c_phone" class="form-control @error('c_phone') is-invalid @enderror" value="{{$employee->employeeInfo->c_phone}}">
                                        @error('c_phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="bank_ac_no">Bank Account No. </label>
                                        <input type="text" name="bank_ac_no" class="form-control @error('bank_ac_no') is-invalid @enderror" value="{{$employee->employeeInfo->bank_ac_no}}">
                                        @error('bank_ac_no')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="bank_c_no">Bank Chequeco No. </label>
                                        <input type="text" name="bank_c_no" class="form-control @error('bank_c_no') is-invalid @enderror" value="{{$employee->employeeInfo->bank_c_no}}">
                                        @error('bank_c_no')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-2">
                                        <label for="j_date">Joining Date <span class="t_r">*</span></label>
                                        <input type="date" name="j_date" class="form-control @error('j_date') is-invalid @enderror" value="{{$employee->employeeInfo->j_date}}" required>
                                        @error('j_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-2">
                                        <label for="salary">Salary <span class="t_r">*</span></label>
                                        <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{$employee->employeeInfo->salary}}" required>
                                        @error('salary')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-5">
                                        <label>Password <span class="t_r">*</span></label>
                                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{$employee->password}}" required>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-5">
                                        <label>Confrim Password <span class="t_r">*</span></label>
                                        <input name="password_confirmation" type="password" class="form-control @error('email') is-invalid @enderror" value="{{$employee->password}}" required>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <hr class="bg-warning">
                                {{-- _________________________Nominee Info_________________________ --}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="g_name">Guarantor Name</label>
                                        <input type="text" name="g_name" class="form-control @error('g_name') is-invalid @enderror" value="{{$employee->employeeInfo->g_name}}">
                                        @error('g_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="g_phone">Guarantor Phone</label>
                                        <input type="number" name="g_phone" class="form-control @error('g_phone') is-invalid @enderror" value="{{$employee->employeeInfo->g_phone}}">
                                        @error('g_phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="relation">Relation</label>
                                        <input type="text" name="relation" class="form-control @error('relation') is-invalid @enderror" value="{{$employee->employeeInfo->relation}}">
                                        @error('relation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="bg-warning">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="address">Mailing Address <span class="t_r">*</span></label>
                                        <textarea name="address" id="" cols="15" rows="6" class="form-control @error('address') is-invalid @enderror" required>{{$employee->address}}</textarea>
                                        {{-- <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}" placeholder="Enter Address" required> --}}
                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group col-sm-6">
                                        <label for="address">Permanent Address <span class="t_r">*</span></label>
                                        <textarea name="p_address" id="" cols="15" rows="6" class="form-control @error('p_address') is-invalid @enderror" required>{{$employee->employeeInfo->p_address}}</textarea>
                                        {{-- <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}" placeholder="Enter Address" required> --}}
                                        @error('p_address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                    <hr class="bg-warning">
                                    <div class="row">
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
</div>

@push('custom_scripts')
<script>
    $('#permissionYes').click(function(){
        $('#permissionShow').show()
    })
    $('#permissionNo').click(function(){
        $('#permissionShow').hide()
    })
</script>
@endpush
@endsection

