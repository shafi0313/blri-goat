<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use App\Models\MilkProduction;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MilkProductionController extends Controller
{
    public function index()
    {
        $milkProductions = MilkProduction::all();
        return view('admin.milk_production.index', compact('milkProductions'));
    }

    public function create()
    {
        $animalInfos = AnimalInfo::all();
        return view('admin.milk_production.create', compact('animalInfos'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'animal_info_id' => 'required',
            'date_of_milking' => 'required',
            'milk_production' => 'required',
        ]);

        $data = [
            'animal_info_id' => $request->animal_info_id,
            'type' => $request->type,
            'date_of_milking' => $request->date_of_milking,
            'milk_production' => $request->milk_production,
        ];

        DB::beginTransaction();
        try{
            MilkProduction::create($data);
            DB::commit();
            toast('Success','success');
            return redirect()->route('milk-production.index');
        }catch(\Exception $ex){
            DB::rollBack();
            toast('Error', 'error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        MilkProduction::find($id)->delete();
        toast('Successfully Deleted','success');
        return redirect()->back();
    }
}
