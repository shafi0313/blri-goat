@extends('admin.layout.master')
@section('title', 'Parasite')
@section('content')
@php $p='healthM'; $sm="parasite"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('parasite.index')}}">Parasite</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Add Parasite</li>
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
                            <form action="{{ route('parasite.store')}}" method="post">
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

                                    {{-- <div class="form-group col-md-3">
                                        <label for="">Breed <span class="t_r">*</span></label>
                                        <input type="text" class="form-control" id="breed"  value="" readonly>
                                    </div> --}}

                                    <div class="form-group col-md-3">
                                        <label for="">Sex <span class="t_r">*</span></label>
                                        <input type="text" class="form-control" id="sex"  value="" readonly>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Age <span class="t_r">*</span></label>
                                        <p style="color:#008CBA" id="result"></p>
                                    </div>



                                    {{-- <div class="form-group col-md-3">
                                        <label for="">Goat Color <span class="t_r">*</span></label>
                                        <input type="text" class="form-control"  id="color" value="" readonly>
                                    </div> --}}

                                    {{-- <div class="form-group col-md-3">
                                        <label for="">Birth Wt. (Kg) <span class="t_r">*</span></label>
                                        <input type="text" class="form-control" id="birth_wt" readonly>
                                    </div> --}}

                                    <div class="form-group col-md-3">
                                        <label for="feces_collection_date">Date of Feces collection <span class="t_r">*</span></label>
                                        <input name="feces_collection_date" type="date" id="date" class="form-control @error('feces_collection_date') is-invalid @enderror" value="{{old('feces_collection_date')}}" required>
                                        @error('feces_collection_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="fecal_egg_count">Fecal egg count (FEC) <span class="t_r">*</span></label>
                                        <input name="fecal_egg_count" type="text" class="form-control @error('fecal_egg_count') is-invalid @enderror" value="{{old('fecal_egg_count')}}" required>
                                        @error('fecal_egg_count')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="fecal_test">Fecal test <span class="t_r">*</span></label>
                                        <input name="fecal_test" type="text" class="form-control @error('fecal_test') is-invalid @enderror" value="{{old('fecal_test')}}" required>
                                        @error('fecal_test')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="season">Season <span class="t_r">*</span></label>
                                        <input name="season" type="text" class="form-control @error('season') is-invalid @enderror" value="{{old('season')}}" id="season" required>
                                        @error('season')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="parasite_name">Parasite name <span class="t_r">*</span></label>
                                        <input name="parasite_name" type="text" class="form-control @error('parasite_name') is-invalid @enderror" value="{{old('parasite_name')}}" required>
                                        @error('parasite_name')
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
                $('#d_o_b').val(res.d_o_b);
                $('#breed').val(res.breed);

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

    $("#date").on('change', function(){
        var sessionBirthCal;
        var sessionBirth = new Date($("#date").val()).getMonth()+1;
        if(sessionBirth==3 || sessionBirth==4 || sessionBirth==5 || sessionBirth==6){
            sessionBirthCal = 'Summer';
        }else if(sessionBirth==7 || sessionBirth==8 || sessionBirth==9 || sessionBirth==10){
            sessionBirthCal = 'Rainy';
        }else{
            sessionBirthCal = 'Winter';
        }
        $('#season').val(sessionBirthCal);
    });


//     function ageCalculator() {
//     //collect input from HTML form and convert into date format

// }


</script>
@endpush
@endsection

