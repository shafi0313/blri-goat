<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use App\Models\MilkProduction;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MilkProductionController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $milkProductions = MilkProduction::all();
        }else{
            $milkProductions = MilkProduction::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.milk_production.index', compact('milkProductions'));
    }

    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        if (Auth::user()->is==1) {
            $animalInfos = AnimalInfo::all();
        }else{
            $animalInfos = AnimalInfo::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.milk_production.create', compact('animalInfos'));
    }

    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $this->validate($request, [
            'animal_info_id' => 'required',
            'parity_number' => 'required',
            'litter_size' => 'required',
            'date_of_milking' => 'required',
            'milk_production' => 'required',
            // 'average_milk_production' => 'required',
        ]);

        $data = [
            'animal_info_id' => $request->animal_info_id,
            'parity_number' => $request->parity_number,
            'litter_size' => $request->litter_size,
            'date_of_milking' => $request->date_of_milking,
            'milk_production' => $request->milk_production,
            'average_milk_production' => $request->average_milk_production,
            'lactation_length' => $request->lactation_length,
            'milk_yield' => $request->milk_yield,
        ];
        $data['user_id'] = Auth::user()->id;

        DB::beginTransaction();
        try{
            MilkProduction::create($data);
            DB::commit();
            toast('Success','success');
            return redirect()->route('milk-production.index');
        }catch(\Exception $ex){
            return $ex->getMessage();
            DB::rollBack();
            toast('Error', 'error');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $milkProductions = MilkProduction::where('animal_info_id',$id)->get();
        return view('admin.milk_production.report', compact('milkProductions'));
    }

    public function destroy($id)
    {
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        MilkProduction::find($id)->delete();
        toast('Successfully Deleted','success');
        return redirect()->back();
    }
}
