<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use App\Models\ProductionRecord;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrductionRecordStoreRequest;
use App\Http\Requests\ProductionRecordUpdateRequest;

class ProductionRecordController extends Controller
{
    public function index()
    {
        $productionRecords = ProductionRecord::all();
        return view('admin.production_record.index', compact('productionRecords'));
    }

    public function create()
    {
        $animalInfos = AnimalInfo::all();
        return view('admin.production_record.create', compact('animalInfos'));
    }

    public function store(PrductionRecordStoreRequest $productionRecordStore)
    {
        $productionRecord = $productionRecordStore->validated();
        DB::beginTransaction();
        try{
            ProductionRecord::create($productionRecord);
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
        $productionRecord = ProductionRecord::find($id);
        return view('admin.production_record.edit', compact('productionRecord'));
    }

    public function update(ProductionRecordUpdateRequest $request, ProductionRecord $ProductionRecord)
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
