@extends('admin.layout.master')
@section('title', 'Post Mortem')
@section('content')
@php $p='healthM'; $sm="postMortem"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('post-mortem.index')}}">Post Mortem</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Add Post Mortem</li>
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
                            <form action="{{ route('post-mortem.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="type" id="type">
                                <input type="hidden" name="date" id="d_o_b">
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
                                        <label for="">Age <span class="t_r">*</span></label>
                                        <p style="color:#008CBA" id="result"></p>
                                    </div> --}}

                                    {{-- <div class="form-group col-md-3">
                                        <label for="dead_culled">Death/Culled <span class="t_r">*</span></label>
                                        <select class="form-control @error('dead_culled') is-invalid @enderror" name="dead_culled">
                                            <option value="">Select</option>
                                            <option value="Death">Death</option>
                                            <option value="Culled">Culled</option>
                                        </select>
                                        @error('dead_culled')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group col-md-3">
                                        <label for="species">Species <span class="t_r">*</span></label>
                                        <input type="text" class="form-control @error('species') is-invalid @enderror" name="species" value="{{old('species')}}" required>
                                        @error('species')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="date">Date <span class="t_r">*</span></label>
                                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{old('date')}}" required>
                                        @error('date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="death_time">Time of Death <span class="t_r">*</span></label>
                                        <input type="time" class="form-control @error('death_time') is-invalid @enderror" name="death_time" value="{{old('death_time')}}" required>
                                        @error('death_time')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="necropsy_time">Time of Necropsy <span class="t_r">*</span></label>
                                        <input type="time" class="form-control @error('necropsy_time') is-invalid @enderror" name="necropsy_time" value="{{old('necropsy_time')}}" required>
                                        @error('necropsy_time')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="clinical_history">Clinical History <span class="t_r">*</span></label>
                                        <input type="text" class="form-control @error('clinical_history') is-invalid @enderror" name="clinical_history" value="{{old('clinical_history')}}" required>
                                        @error('clinical_history')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="gross_lesions">Gross Lesions <span class="t_r">*</span></label>
                                        <input type="text" class="form-control @error('gross_lesions') is-invalid @enderror" name="gross_lesions" value="{{old('gross_lesions')}}" required>
                                        @error('gross_lesions')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="microscopic_lesions">Microscopic Lesions <span class="t_r">*</span></label>
                                        <input type="text" class="form-control @error('microscopic_lesions') is-invalid @enderror" name="microscopic_lesions" value="{{old('microscopic_lesions')}}" required>
                                        @error('microscopic_lesions')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="tentative">Tentative/Final Diagnosis <span class="t_r">*</span></label>
                                        <input type="text" class="form-control @error('tentative') is-invalid @enderror" name="tentative" value="{{old('tentative')}}" required>
                                        @error('tentative')
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
                $('#d_o_b').val(res.d_o_b);
                $('#breed').val(res.breed);

                // var userinput = res.d_o_b;
                // var dob = new Date(userinput);

                // // var dob = new Date(userinput);

                // //check user provide input or not
                // if(userinput==null || userinput==''){
                // document.getElementById("message").innerHTML = "**Choose a date please!";
                // return false;
                // }

                // //execute if user entered a date
                // else {
                //     //extract and collect only date from date-time string
                //     var mdate = userinput.toString();
                //     var dobYear = parseInt(mdate.substring(0,4), 10);
                //     var dobMonth = parseInt(mdate.substring(5,7), 10);
                //     var dobDate = parseInt(mdate.substring(8,10), 10);

                //     //get the current date from system
                //     var today = new Date();
                //     //date string after broking
                //     var birthday = new Date(dobYear, dobMonth-1, dobDate);

                //     //calculate the difference of dates
                //     var diffInMillisecond = today.valueOf() - birthday.valueOf();

                //     //convert the difference in milliseconds and store in day and year variable
                //     var year_age = Math.floor(diffInMillisecond / 31536000000);
                //     var day_age = Math.floor((diffInMillisecond % 31536000000) / 86400000);

                //     //when birth date and month is same as today's date
                //     if ((today.getMonth() == birthday.getMonth()) && (today.getDate() == birthday.getDate())) {
                //             alert("Happy Birthday!");
                //         }

                //     var month_age = Math.floor(day_age/30);
                //     day_ageday_age = day_age % 30;

                //     var tMnt= (month_age + (year_age*12));
                //     var tDays =(tMnt*30) + day_age;

                //     //DOB is greater than today's date, generate an error: Invalid date
                //     if (dob>today) {
                //         document.getElementById("result").innerHTML = ("Invalid date input - Please try again!");
                //     }
                //     else {
                //         document.getElementById("result").innerHTML = year_age + " years " + month_age + " months "
                //         // document.getElementById("result").innerHTML = year_age + " years " + month_age + " months " + day_age + " days"
                //     }
                // }
            }
        })
    });

    $('#date_dead_culled').on('change',function(e) {
        var userinput = $("#d_o_b").val();
        var dob = new Date(userinput);
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
            var date_dead_culled = $("#date_dead_culled").val();
            var today = new Date(date_dead_culled);
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
    });
</script>
@endpush
@endsection

