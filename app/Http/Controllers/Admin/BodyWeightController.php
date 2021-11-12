<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\AnimalInfo;
use App\Models\BodyWeight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BodyWeightStoreRequest;
use App\Http\Requests\BodyWeightUpdateRequest;

class BodyWeightController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $productionRecords = BodyWeight::all();
        }else{
            $productionRecords = BodyWeight::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.body_weight.index', compact('productionRecords'));
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
        return view('admin.body_weight.create', compact('animalInfos'));
    }

    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        // $productionRecord = $query->validated();

        $birth_wt = $request->birth_wt;
        $animal_info_id = $request->animal_info_id;
        $data = [
            'user_id' => Auth::user()->id,
            'animal_info_id' => $request->animal_info_id,
            'month_1' => $request->month_1,
            'month_2' => $request->month_2,
            'month_3' => $request->month_3,
            'month_4' => $request->month_4,
            'month_5' => $request->month_5,
            'month_6' => $request->month_6,
            'month_7' => $request->month_7,
            'month_8' => $request->month_8,
            'month_9' => $request->month_9,
            'month_10' => $request->month_10,
            'month_11' => $request->month_11,
            'month_12' => $request->month_12,
            'g_rate_month_3' => ($request->month_3 - $birth_wt/90)*1000,
            'g_rate_month_6' => ($request->month_6 - $birth_wt/180)*1000,
            'g_rate_month_9' => ($request->month_9 - $birth_wt/270)*1000,
            'g_rate_month_12' => ($request->month_12 - $birth_wt/360)*1000,
        ];
        // $request->month_3 ?? $data['g_rate_month_3'] =


        DB::beginTransaction();
        try{
            BodyWeight::where('animal_info_id', $animal_info_id)->update($data) || BodyWeight::create($data);
            DB::commit();
            toast('Success','success');
            return redirect()->route('body-weight.index');
        }catch(\Exception $ex){
            DB::rollBack();
            toast($ex->getMessage(),'Error', 'error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->sendPermissionError('edit')) {
            return $error;
        }
        $productionRecord = BodyWeight::find($id);
        return view('admin.body_weight.edit', compact('productionRecord'));
    }

    public function update(BodyWeightUpdateRequest $request, BodyWeight $ProductionRecord)
    {
        if ($error = $this->sendPermissionError('edit')) {
            return $error;
        }
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

    public function getBodyWeight(Request $request)
    {
        $animalInfoId = $request->animalInfoId;
        $bodyWeights = BodyWeight::where('animal_info_id', $animalInfoId)->get();
        if($bodyWeights->count()>0){
            foreach($bodyWeights as $bodyWeight){
                $month_1 = $bodyWeight->month_1;
                $month_2 = $bodyWeight->month_2;
                $month_3 = $bodyWeight->month_3;
                $month_4 = $bodyWeight->month_4;
                $month_5 = $bodyWeight->month_5;
                $month_6 = $bodyWeight->month_6;
                $month_7 = $bodyWeight->month_7;
                $month_8 = $bodyWeight->month_8;
                $month_9 = $bodyWeight->month_9;
                $month_10 = $bodyWeight->month_10;
                $month_11 = $bodyWeight->month_11;
                $month_12 = $bodyWeight->month_12;
                return json_encode(['month_1'=>$month_1, 'month_2'=>$month_2, 'month_3'=>$month_3, 'month_4'=>$month_4, 'month_5'=>$month_5, 'month_6'=>$month_6, 'month_7'=>$month_7, 'month_8'=>$month_8, 'month_9'=>$month_9, 'month_10'=>$month_10, 'month_11'=>$month_11, 'month_12'=>$month_12]);
            }
        }else{
            return json_encode(['month_1'=>'', 'month_2'=>'', 'month_3'=>'', 'month_4'=>'', 'month_5'=>'', 'month_6'=>'', 'month_7'=>'', 'month_8'=>'', 'month_9'=>'', 'month_10'=>'', 'month_11'=>'', 'month_12'=>'']);
        }

    }
}
