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
                    <li class="nav-item active">Edit Morphometric</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- Page Content Start --}}
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Edit</h4>
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
                            <form action="{{ route('morphometric.update', $data->id)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="name">Animal Tag <span class="t_r">*</span></label>
                                        <select name="animal_info_id" id="animalInfo" class="form-control @error('animal_info_id') is-invalid @enderror">
                                            <option value="">Select</option>
                                            @foreach ($animalInfos as $animalInfo)
                                            <option value="{{$animalInfo->id}}" {{$data->animal_info_id==$animalInfo->id?'selected':''}}>{{$animalInfo->animal_tag}}</option>
                                            @endforeach
                                        </select>
                                        @error('animal_info_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <div class="form-group col-md-3">
                                        <label for="">Sex <span class="t_r">*</span></label>
                                        <input type="text" class="form-control" id="sex"  value="" readonly>
                                    </div> --}}

                                    <div class="form-group col-md-3">
                                        <label for="body_lenght">Body length (cm) <span class="t_r">*</span></label>
                                        <input name="body_lenght" type="number" step="any" class="form-control @error('body_lenght') is-invalid @enderror" value="{{$data->body_lenght}}">
                                        @error('body_lenght')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="weither_height">Weither height <span class="t_r">*</span></label>
                                        <input name="weither_height" type="number" step="any" class="form-control @error('weither_height') is-invalid @enderror" value="{{$data->weither_height}}">
                                        @error('weither_height')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="horn_pattern">Horn pattern </label>
                                       <select name="horn_pattern" class="form-control @error('horn_pattern') is-invalid @enderror">
                                            <option value="">Select</option>
                                            <option value="Strait" {{$data->horn_pattern=="Strait"?'selected':''}}>Strait</option>
                                            <option value="Curved" {{$data->horn_pattern=="Curved"?'selected':''}}>Curved</option>
                                            <option value="Spiral" {{$data->horn_pattern=="Spiral"?'selected':''}}>Spiral</option>
                                            <option value="Hornless" {{$data->horn_pattern=="Hornless"?'selected':''}}>Hornless</option>
                                        </select>
                                        @error('horn_pattern')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="scrotum_length">Scrotum length </label>
                                        <input name="scrotum_length" type="number" step="any" class="form-control @error('scrotum_length') is-invalid @enderror" value="{{$data->scrotum_length}}">
                                        @error('scrotum_length')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="scrotum_diameter">Scrotum diameter </label>
                                        <input name="scrotum_diameter" type="number" step="any" class="form-control @error('scrotum_diameter') is-invalid @enderror" value="{{$data->scrotum_diameter}}">
                                        @error('scrotum_diameter')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="rump_height">Rump height </label>
                                        <input name="rump_height" type="number" step="any" class="form-control @error('rump_height') is-invalid @enderror" value="{{$data->rump_height}}">
                                        @error('rump_height')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="rump_weight">Rump weight </label>
                                        <input name="rump_weight" type="number" step="any" class="form-control @error('rump_weight') is-invalid @enderror" value="{{$data->rump_weight}}">
                                        @error('rump_weight')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="rump_length">Rump length</label>
                                        <input name="rump_length" type="number" step="any" class="form-control @error('rump_length') is-invalid @enderror" value="{{$data->rump_length}}">
                                        @error('rump_length')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="horn_length">Horn length </label>
                                        <input name="horn_length" type="number" step="any" class="form-control @error('horn_length') is-invalid @enderror" value="{{$data->horn_length}}">
                                        @error('horn_length')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="tail_length">Tail length <span class="t_r">*</span></label>
                                        <input name="tail_length" type="number" step="any" class="form-control @error('tail_length') is-invalid @enderror" value="{{$data->tail_length}}">
                                        @error('tail_length')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="ear_length">Ear length <span class="t_r">*</span></label>
                                        <input name="ear_length" type="number" step="any" class="form-control @error('ear_length') is-invalid @enderror" value="{{$data->ear_length}}">
                                        @error('ear_length')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="h_girth_length">H.girth length <span class="t_r">*</span></label>
                                        <input name="h_girth_length" type="number" step="any" class="form-control @error('h_girth_length') is-invalid @enderror" value="{{$data->h_girth_length}}">
                                        @error('h_girth_length')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="height_of_rump">Height of rump <span class="t_r">*</span></label>
                                        <input name="height_of_rump" type="number" step="any" class="form-control @error('height_of_rump') is-invalid @enderror" value="{{$data->height_of_rump}}">
                                        @error('height_of_rump')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="head_length">Head length <span class="t_r">*</span></label>
                                        <input name="head_length" type="number" step="any" class="form-control @error('head_length') is-invalid @enderror" value="{{$data->head_length}}">
                                        @error('head_length')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="eye_to_eye_length">Eye to eye length <span class="t_r">*</span></label>
                                        <input name="eye_to_eye_length" type="number" step="any" class="form-control @error('eye_to_eye_length') is-invalid @enderror" value="{{$data->eye_to_eye_length}}">
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
                $('#birth_wt').val(res.birth_wt);
                $('#type').val(res.type);
                $('#d_o_b').val(res.d_o_b);

                var userinput = res.d_o_b;
                var dob = new Date(userinput);

                // var dob = new Date(userinput);

                //check user provide input or not
                if(userinput==null || userinput==''){
                document.getElementById("message").innerHTML = "**Choose a date please!";
                return false;
                }

                //execute if user entered a date
                else {
                    //extract and collect only date from date-time string
                    var mdate = userinput.toString();
                    var dobYear = parseInt(mdate.substring(0,4), 10);
                    var dobMonth = parseInt(mdate.substring(5,7), 10);
                    var dobDate = parseInt(mdate.substring(8,10), 10);

                    //get the current date from system
                    var today = new Date();
                    //date string after broking
                    var birthday = new Date(dobYear, dobMonth-1, dobDate);

                    //calculate the difference of dates
                    var diffInMillisecond = today.valueOf() - birthday.valueOf();

                    //convert the difference in milliseconds and store in day and year variable
                    var year_age = Math.floor(diffInMillisecond / 31536000000);
                    var day_age = Math.floor((diffInMillisecond % 31536000000) / 86400000);

                    //when birth date and month is same as today's date
                    if ((today.getMonth() == birthday.getMonth()) && (today.getDate() == birthday.getDate())) {
                            alert("Happy Birthday!");
                        }

                    var month_age = Math.floor(day_age/30);
                    day_ageday_age = day_age % 30;

                    var tMnt= (month_age + (year_age*12));
                    var tDays =(tMnt*30) + day_age;

                    //DOB is greater than today's date, generate an error: Invalid date
                    if (dob>today) {
                        document.getElementById("result").innerHTML = ("Invalid date input - Please try again!");
                    }
                    else {
                        document.getElementById("result").innerHTML = year_age + " years " + month_age + " months "
                        // document.getElementById("result").innerHTML = year_age + " years " + month_age + " months " + day_age + " days"
                    }
                }
            }
        })
    });
</script>
@endpush
@endsection

