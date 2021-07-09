<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Service;
use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
