<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use App\Models\SemenAnalysis;
use Illuminate\Support\Facades\DB;
use App\Actions\FarmOrCommunityData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SemenAnalysisController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $semenAnalyses = SemenAnalysis::all();
        }else{
            $semenAnalyses = SemenAnalysis::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.semen_analysis.index', compact('semenAnalyses'));
    }

    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        if (Auth::user()->is==1) {
            $animalInfos = AnimalInfo::whereSex('M')->whereStatus(0)->get();
        }else{
            $animalInfos = AnimalInfo::whereSex('M')->whereUser_id(Auth::user()->id)->whereStatus(0)->get();
        }
        return view('admin.semen_analysis.create', compact('animalInfos'));
    }

    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $this->validate($request, [
            'animal_info_id' => 'required',
        ]);

        $data = [
            'animal_info_id' => $request->animal_info_id,
            'coll_date' => $request->coll_date,
            'volume' => $request->volume,
            's_color' => $request->s_color,
            'number_of_straw' => $request->number_of_straw,
        ];
        $data['user_id'] = Auth::user()->id;
        $farmOrCommunityData = FarmOrCommunityData::getFarmOrCommunityData($request->animal_info_id);
        DB::beginTransaction();
        try{
            SemenAnalysis::create($data+$farmOrCommunityData);
            DB::commit();
            toast('Success','success');
            return redirect()->route('semen-analysis.index');
        }catch(\Exception $ex){
            DB::rollBack();
            toast('Error', 'error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        SemenAnalysis::find($id)->delete();
        toast('Successfully Deleted','success');
        return redirect()->back();
    }
}
