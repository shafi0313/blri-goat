<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use App\Models\Reproduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReproductionStoreRequest;

class ReproductionController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $reproductions = Reproduction::all();
        }else{
            $reproductions = Reproduction::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.reproduction.index', compact('reproductions'));
    }

    public function create()
    {
        if (Auth::user()->is==1) {
            $animalInfos = AnimalInfo::all();
        }else{
            $animalInfos = AnimalInfo::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.reproduction.create', compact('animalInfos'));
    }

    public function store(ReproductionStoreRequest $request)
    {
        $productionRecord = $request->validated();
        DB::beginTransaction();
        $productionRecord['user_id'] = Auth::user()->id;
        // Reproduction::create($productionRecord);
        try{
            Reproduction::create($productionRecord);
            DB::commit();
            toast('Success','success');
            return redirect()->route('reproduction-record.index');
        }catch(\Exception $ex){
            DB::rollBack();
            toast('Error', 'error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $productionRecord = Reproduction::find($id);
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
    public function getAnimalInfo(Request $request)
    {
        $animalInfoId = $request->animalInfoId;
        $animalInfos = AnimalInfo::where('id', $animalInfoId)->get();
        foreach($animalInfos as $animalInfo){
            $sex = $animalInfo->sex;
            $color = $animalInfo->color;
            $birth_wt = $animalInfo->birth_wt;
            $type = $animalInfo->type;
            $d_o_b = $animalInfo->d_o_b;
        }
        return json_encode(['sex'=>$sex, 'color'=>$color, 'birth_wt'=>$birth_wt, 'type'=>$type, 'd_o_b'=>$d_o_b]);
    }
}
