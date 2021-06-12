<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\BodyWeightStoreRequest;
use App\Http\Requests\BodyWeightUpdateRequest;
use App\Models\BodyWeight;

class BodyWeightController extends Controller
{
    public function index()
    {
        $productionRecords = BodyWeight::all();
        return view('admin.body_weight.index', compact('productionRecords'));
    }

    public function create()
    {
        $animalInfos = AnimalInfo::all();
        return view('admin.body_weight.create', compact('animalInfos'));
    }

    public function store(BodyWeightStoreRequest $productionRecordStore)
    {
        $productionRecord = $productionRecordStore->validated();
        DB::beginTransaction();
        try{
            BodyWeight::create($productionRecord);
            DB::commit();
            toast('Success','success');
            return redirect()->route('production-record.index');
        }catch(\Exception $ex){
            DB::rollBack();
            toast('Error', 'error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $productionRecord = BodyWeight::find($id);
        return view('admin.body_weight.edit', compact('productionRecord'));
    }

    public function update(BodyWeightUpdateRequest $request, BodyWeight $ProductionRecord)
    {
        $data = $request->validated();

        try{
            $ProductionRecord->update($data);
            toast('Success','success');
            return redirect()->route('production-record.index');
        }catch(\Exception $ex){
             toast('Error','error');
            return redirect()->back();
        }
    }

}
