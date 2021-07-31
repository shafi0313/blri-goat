<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Service;
use App\Models\AnimalInfo;
use App\Models\Reproduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReproductionStoreRequest;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        $animalInfos = AnimalInfo::where('sex','F')->get();
        return view('admin.service.create', compact('animalInfos'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'animal_info_id' => 'required',
            'date_of_service' => 'required',
        ]);

        $animal_info_id = $request->animal_info_id;

        $expected_d_o_b = Carbon::parse($request->date_of_service)->addDays(145)->format('Y-m-d');
        $service = Service::where('animal_info_id', $animal_info_id)->latest()->whereDate('expected_d_o_b','>=', $request->date_of_service)->first();

        if($service){
            $repeat_heat = 'Heat';
        }else{
            $repeat_heat = 'Not';
        }

        $data = [
            'animal_info_id' => $request->animal_info_id,
            'date_of_service' => $request->date_of_service,
            'expected_d_o_b' => $expected_d_o_b,
            'natural' => $request->natural,
            'repeat_heat' => $repeat_heat,
        ];

        // $serviceForRepro = Service::where('animal_info_id', $animal_info_id)->first();
       $getReproduction = Reproduction::where('animal_info_id', $animal_info_id)->first();
    //    return $getReproduction->service_1st_date;
        // $reproduction[''] = '';
        if($getReproduction==null || $getReproduction->count() < 1 ){
            $reproduction = [
                'animal_info_id' => $request->animal_info_id,
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
            }
            Reproduction::where('id', $getReproduction->id)->update($reproduction);
        }





        // if($getReproduction->count() < 1){
        //     $reproduction = [
        //         'animal_info_id' => $request->animal_info_id,
        //         'service_1st_date' => $request->date_of_service,
        //     ];
        //     Reproduction::create($reproduction);
        // }else{
        //     switch($serviceForRepro->count() + 1){
        //         case 1:
        //             $reproduction['service_1st_date'] = $request->date_of_service;
        //             break;
        //         case 2:
        //             $reproduction['service_2nd_date'] = $request->date_of_service;
        //             break;
        //         case 3:
        //             $reproduction['service_3rd_date'] = $request->date_of_service;
        //             break;
        //         case 4:
        //             $reproduction['service_4th_date'] = $request->date_of_service;
        //             break;
        //         case 5:
        //             $reproduction['service_5th_date'] = $request->date_of_service;
        //             break;
        //         case 6:
        //             $reproduction['service_6th_date'] = $request->date_of_service;
        //             break;
        //     }
        //     Reproduction::where('animal_info_id', $animal_info_id)->update($reproduction);
        // }

        DB::beginTransaction();
        try{
            Service::create($data);
            DB::commit();
            toast('Success','success');
            return redirect()->route('service.index');
        }catch(\Exception $ex){
            DB::rollBack();
            toast('Error', 'error');
            return redirect()->back();
        }
    }
}
