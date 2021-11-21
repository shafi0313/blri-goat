@extends('admin.layout.master')
@section('title', 'Disease and Treatment')
@section('content')
@php $p='healthM'; $sm="diseaseTreatment"; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('disease-and-treatment.index')}}">Disease and Treatment</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Add Disease and Treatment</li>
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
                            <form action="{{ route('disease-and-treatment.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="animal_cat_id" id="animal_cat_id">
                                <input type="hidden" name="animal_sub_cat_id" id="animal_sub_cat_id">
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

                                    <div class="form-group col-md-3">
                                        <label for="">Age <span class="t_r">*</span></label>
                                        <p style="color:#008CBA" id="result"></p>
                                    </div>

                                    <div class="form-group col-md-3" id="disease_div">
                                        <label for="disease_id">Name of Disease <span class="t_r">*</span></label>
                                        <select name="disease_id" id="disease" class="form-control" required>
                                            <option>Select</option>
                                            <option  value="0">Other</option>
                                            @foreach ($diseases as $disease)
                                            <option value="{{ $disease->id }}">{{ $disease->name }}</option>
                                            @endforeach



                                            {{-- <option value="Pneumonia">Pneumonia</option>
                                            <option value="PPR">PPR</option>
                                            <option value="Bloat">Bloat</option>
                                            <option value="Urolithiasis">Urolithiasis</option>
                                            <option value="Actinomycosis">Actinomycosis</option>
                                            <option value="Skin disease">Skin disease</option>
                                            <option value="Poisoning">Poisoning</option>
                                            <option value="Mechanical">Mechanical</option>
                                            <option value="Malnutrition">Malnutrition</option>
                                            <option value="Ecthyma">Ecthyma</option>
                                            <option value="Mastitis">Mastitis</option>
                                            <option value="Abortion">Abortion</option> --}}

                                        </select>
                                        @error('disease')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <div class="form-group col-md-3" style="display: none" id="disease_input">
                                        <label for="disease">Disease <span class="t_r">*</span></label>
                                        <input type="text" id="disease_inputt" class="form-control @error('disease') is-invalid @enderror" name="disease" value="{{old('disease')}}">
                                        @error('disease')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group col-md-3" id="clinical_sign_div">
                                        <label for="disease_name">Clinical Sign <span class="t_r">*</span></label>
                                        <select name="clinical_sign_id" id="clinical_sign" class="form-control @error('clinical_sign_id') is-invalid @enderror" required>
                                            <option>Select</option>
                                            <option value="0">Others</option>
                                            @foreach ($clinicalSigns as $clinicalSign)
                                            <option value="{{ $clinicalSign->id }}">{{ $clinicalSign->name }}</option>
                                            @endforeach


                                            {{-- <option >Select</option>
                                            <option value="Diarrhea">Diarrhea</option>
                                            <option value="Other">Other</option> --}}
                                        </select>
                                        @error('clinical_sign_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <div class="form-group col-md-3" style="display: none" id="clinical_sign_in_div">
                                        <label for="clinical_sign_id">Clinical Sign <span class="t_r">*</span></label>
                                        <input type="text" id="clinical_sign_input" class="form-control @error('clinical_sign_id') is-invalid @enderror" name="clinical_sign" value="{{old('clinical_sign_id')}}">
                                        @error('clinical_sign')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}


                                    <div class="form-group col-md-3">
                                        <label for="disease_date">Date of Disease <span class="t_r">*</span></label>
                                        <input type="date" id="disease_date" class="form-control @error('disease_date') is-invalid @enderror" name="disease_date" value="{{old('disease_date')}}">
                                        @error('disease_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="disease_season">Season of Disease <span class="t_r">*</span></label>
                                        <input type="text" id="season_o_birth" class="form-control @error('disease_season') is-invalid @enderror" name="disease_season" value="{{old('disease_season')}}" readonly>
                                        @error('disease_season')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="medicine_prescribed">Medicine Prescribed</label>
                                        <input type="text" class="form-control @error('medicine_prescribed') is-invalid @enderror" name="medicine_prescribed" value="{{old('medicine_prescribed')}}">
                                        @error('medicine_prescribed')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="recovered_dead">Recovered/ Dead <span class="t_r">*</span></label>
                                        <select name="recovered_dead"  class="form-control @error('recovered_dead') is-invalid @enderror">
                                            <option value="">Select</option>
                                            <option value="Recovered">Recovered</option>
                                            <option value="Dead">Dead</option>
                                        </select>
                                        @error('recovered_dead')
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
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Launch demo modal
                          </button> --}}
                    {{-- Page Content End --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layout.footer')
</div>



 <!-- Modal -->
 <form id="disease_store" action="{{ route('disease.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="modal fade" id="disease_modal" tabindex="-1" role="dialog"
        aria-labelledby="measure">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="measure" style="color: red !important">Add Disease</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Disease Name</label>
                                <input type="text" name="disease_name" id="disease_name" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success ">Save </button>
                </div>
            </div>
        </div>
    </div>
</form>

 <!-- Modal -->
 <form id="clinical_sign_store" action="{{ route('clinical-sign.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="modal fade" id="clinical_sign_modal" tabindex="-1" role="dialog"
        aria-labelledby="measure">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="measure" style="color: red !important">Add Clinical Sign</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Clinical Sign Name</label>
                                <input type="text" name="clinical_sign_name" id="clinical_sign_name" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success ">Save </button>
                </div>
            </div>
        </div>
    </div>
</form>


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
                $('#animal_cat_id').val(res.animal_cat_id);
                $('#animal_sub_cat_id').val(res.animal_sub_cat_id);
                $('#type').val(res.type);

                var userinput = res.d_o_b;
                var dob = new Date(userinput);
                if(userinput==null || userinput==''){
                document.getElementById("message").innerHTML = "**Choose a date please!";
                return false;
                } else {
                    var mdate = userinput.toString();
                    var dobYear = parseInt(mdate.substring(0,4), 10);
                    var dobMonth = parseInt(mdate.substring(5,7), 10);
                    var dobDate = parseInt(mdate.substring(8,10), 10);
                    var today = new Date();
                    var birthday = new Date(dobYear, dobMonth-1, dobDate);
                    var diffInMillisecond = today.valueOf() - birthday.valueOf();
                    var year_age = Math.floor(diffInMillisecond / 31536000000);
                    var day_age = Math.floor((diffInMillisecond % 31536000000) / 86400000);
                    if ((today.getMonth() == birthday.getMonth()) && (today.getDate() == birthday.getDate())) {
                            alert("Happy Birthday!");
                        }
                    var month_age = Math.floor(day_age/30);
                    day_ageday_age = day_age % 30;
                    var tMnt= (month_age + (year_age*12));
                    var tDays =(tMnt*30) + day_age;
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

    // Session of birth Calculation
    $("#disease_date").on('change', function(){
        var sessionBirthCal;
        var sessionBirth = new Date($("#disease_date").val()).getMonth()+1;
        if(sessionBirth==3 || sessionBirth==4 || sessionBirth==5 || sessionBirth==6){
            sessionBirthCal = 'Summer';
        }else if(sessionBirth==7 || sessionBirth==8 || sessionBirth==9 || sessionBirth==10){
            sessionBirthCal = 'Rainy';
        }else{
            sessionBirthCal = 'Winter';
        }
        $('#season_o_birth').val(sessionBirthCal);
    });

    // $("#disease").on('change', function(){
    //     var disease = $(this).val();
    //     if(disease=='Other'){
    //         $("#disease_input").show();
    //         $("#disease_div").hide();
    //         $("#disease").attr('disabled', true);
    //         $("#disease_inputt").attr('disabled', false);
    //     }else{
    //         $("#disease_inputt").attr('disabled', true);
    //         $("#disease").attr('disabled', false);
    //     }
    // });

    // $("#clinical_sign").on('change', function(){
    //     var clinical_sign = $(this).val();
    //     if(clinical_sign=='Other'){
    //         $("#clinical_sign_in_div").show();
    //         $("#clinical_sign_div").hide();
    //         $("#clinical_sign").attr('disabled', true);
    //         $("#clinical_sign_input").attr('disabled', false);
    //     }else{
    //         $("#clinical_sign_input").attr('disabled', true);
    //         $("#clinical_sign").attr('disabled', false);
    //     }
    // });






    $("#disease").on('change', function(){
        var buy_measure_unit = $(this).val();
        if(buy_measure_unit == "0"){
            $('#disease_modal').modal('show');
        }
    });

    $("#disease_store").submit(function(e){
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        console.log(formURL);
        $.ajax(
        {
            url : formURL,
            timeout: 1000,
            type: "POST",
            async:false,
            crossDomain:true,
            data : postData,
            success:function(res){
                if(res.status == 200){
                    let disease = '<option value="" selected="" disabled="">Select</option> <option value="0">Others</option>';
                    $.each(res.diseases, function(i,v){
                        disease += '<option value="'+v.id+'">'+v.name+'</option>';
                    });
                    $("#disease").html(disease);
                    $(".job_success").text('Success.');
                    $("#disease_name").val("");
                    toast('success', res.message);
                    $('#disease_modal').modal('hide');
                } else {
                    toast('error', res.message);
                }
            },
            error:err=>{
                toast('error', 'Error');
            }

        });
        e.preventDefault();
    });

    $("#clinical_sign").on('change', function(){
        var buy_measure_unit = $(this).val();
        if(buy_measure_unit == "0"){
            $('#clinical_sign_modal').modal('show');
        }
    });

    $("#clinical_sign_store").submit(function(e){
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        console.log(formURL);
        $.ajax(
        {
            url : formURL,
            timeout: 1000,
            type: "POST",
            async:false,
            crossDomain:true,
            data : postData,
            success:function(res){
                if(res.status == 200){
                    let clinicalSign = '<option value="" selected="" disabled="">Select</option> <option value="0">Others</option>';
                    $.each(res.clinicalSigns, function(i, v){
                        clinicalSign += '<option value="'+v.id+'">'+v.name+'</option>';
                    });
                    $("#clinical_sign").html(clinicalSign);
                    $(".job_success").text('Success.');
                    $("#clinical_sign_name").val("");
                    toast('success', res.message);
                    $('#clinical_sign_modal').modal('hide');
                } else {
                    toast('error', res.message);
                }
            },
            error:err=>{
                toast('error', 'Error');
            }

        });
        e.preventDefault();
    });

</script>
<script>
    function toast(status,header,msg) {
        Command: toastr[status](header, msg)
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }
</script>
@endpush
@endsection

