<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use App\Models\Distribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DistributionController extends Controller
{
    public function index()
    {
        $distributions = Distribution::all();
        return view('admin.distribution.index', compact('distributions'));
    }

    public function create()
    {
        $animalInfos = AnimalInfo::all();
        return view('admin.distribution.create', compact('animalInfos'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'animal_info_id' => 'required',
        ]);

        $data = [
            'animal_info_id' => $request->animal_info_id,
            'type' => $request->type,
            'dis_date' => $request->dis_date,
            'address_of_rec' => $request->address_of_rec,
        ];

        DB::beginTransaction();
        try{
            Distribution::create($data);
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
        SemenAnalysis::find($id)->delete();
        toast('Successfully Deleted','success');
        return redirect()->back();
    }
}
