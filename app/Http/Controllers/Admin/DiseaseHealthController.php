<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use App\Models\DiseaseHealth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DiseaseHealthStoreRequest;

class DiseaseHealthController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $diseaseHealths = DiseaseHealth::all();
        }else{
            $diseaseHealths = DiseaseHealth::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.disease_health.index', compact('diseaseHealths'));
    }

    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $animalInfos = getAnimalInfo();
        return view('admin.disease_health.create', compact('animalInfos'));
    }

    public function store(DiseaseHealthStoreRequest $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;

        DB::beginTransaction();
        try {
            DiseaseHealth::create($data);
            DB::commit();
            toast('Success', 'success');
            return redirect()->route('disease-and-health.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            toast('Error', 'error');
            return redirect()->back();
        }
    }

    // public function update(DiseaseHealthStoreRequest $request)
    // {
    //     $data = $request->validated();

    //     try{
    //         $ProductionRecord->update($data);
    //         toast('Success','success');
    //         return redirect()->route('production-record.index');
    //     }catch(\Exception $ex){
    //          toast('Error','error');
    //         return redirect()->back();
    //     }
    // }
}

