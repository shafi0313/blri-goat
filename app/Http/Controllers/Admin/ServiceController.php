<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Service;
use App\Models\AnimalInfo;
use App\Models\Reproduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReproductionStoreRequest;

class ServiceController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $services = Service::latest()->get();
        }else{
            $services = Service::whereUser_id(Auth::user()->id)->latest()->get();
        }
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }

        if (Auth::user()->is==1) {
            $animalInfosM = AnimalInfo::whereSex('M')->whereNotNull('sire')->get();
            $animalInfosF = AnimalInfo::whereSex('F')->whereNotNull('dam')->get();
        }else{
            $animalInfosM = AnimalInfo::whereUser_id(Auth::user()->id)->whereSex('M')->whereNotNull('sire')->get();
            $animalInfosF = AnimalInfo::whereUser_id(Auth::user()->id)->whereSex('F')->whereNotNull('dam')->get();
        }
        return view('admin.service.create', compact('animalInfosM','animalInfosF'));
    }

    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $this->validate($request, [
            'buck_tag' => 'required',
            'doe_tag' => 'required',
            'date_of_service' => 'required',
        ]);

        $animal_info_id = AnimalInfo::where('dam',$request->doe_tag)->first();

        $expected_d_o_b = Carbon::parse($request->date_of_service)->addDays(145)->format('Y-m-d');
        $service = Service::where('doe_tag', $animal_info_id->dam)->latest()->whereDate('expected_d_o_b','>=', $request->date_of_service)->first();

        if($service){
            $repeat_heat = 'Heat';
        }else{
            $repeat_heat = 'Not';
        }
        DB::beginTransaction();

        $generation = AnimalInfo::where('dam', $request->doe_tag)->first()->generation;
        $data = [
            'user_id' => Auth::user()->id,
            'buck_tag' => $request->buck_tag,
            'doe_tag' => $request->doe_tag,
            'date_of_service' => $request->date_of_service,
            'expected_d_o_b' => $expected_d_o_b,
            'natural' => $request->natural,
            'repeat_heat' => $repeat_heat,
            'generation' => $generation,
        ];
        Service::create($data);


        $getReproduction = Reproduction::where('animal_info_id', $animal_info_id->id)->first();
        if($getReproduction==null || $getReproduction->count() < 1 ){
            $reproduction = [
                'user_id' => Auth::user()->id,
                'animal_info_id' => $animal_info_id->id,
                'service_1st_date' => $request->date_of_service,
            ];
            Reproduction::create($reproduction);
        }else{
            if($getReproduction->service_1st_date == null){
                $reproduction['service_1st_date'] = $request->date_of_service;
            }elseif($getReproduction->service_2nd_date == null){
                $reproduction['service_2nd_date'] = $request->date_of_service;
            }elseif($getReproduction->service_3rd_date == null){
                $reproduction['service_3rd_date'] = $request->date_of_service;
            }elseif($getReproduction->service_4th_date == null){
                $reproduction['service_4th_date'] = $request->date_of_service;
            }elseif($getReproduction->service_5th_date == null){
                $reproduction['service_5th_date'] = $request->date_of_service;
            }elseif($getReproduction->service_6th_date == null){
                $reproduction['service_6th_date'] = $request->date_of_service;
            }elseif($getReproduction->service_7th_date == null){
                $reproduction['service_7th_date'] = $request->date_of_service;
            }elseif($getReproduction->service_8th_date == null){
                $reproduction['service_8th_date'] = $request->date_of_service;
            }elseif($getReproduction->service_9th_date == null){
                $reproduction['service_9th_date'] = $request->date_of_service;
            }elseif($getReproduction->service_10th_date == null){
                $reproduction['service_10th_date'] = $request->date_of_service;
            }
            Reproduction::where('id', $getReproduction->id)->update($reproduction);
        }


        try{
            DB::commit();
            toast('Success','success');
            return redirect()->route('service.index');
        }catch(\Exception $ex){
            return $ex->getMessage();
            DB::rollBack();
            toast('Error', 'error');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $services = Service::where('doe_tag', $id)->get();
        return view('admin.service.report', compact('services'));
    }
}
