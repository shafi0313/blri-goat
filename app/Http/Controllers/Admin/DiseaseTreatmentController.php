<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use App\Models\DiseaseTreatment;
use App\Http\Controllers\Controller;
use App\Models\Disease;

class DiseaseTreatmentController extends Controller
{
    public function index()
    {
        $diseaseTreatments = DiseaseTreatment::all();
        return view('admin.disease_treatment.index', compact('diseaseTreatments'));
    }


    public function create()
    {
        $animalInfos = AnimalInfo::all();
        $diseases = Disease::all();
        return view('admin.disease_treatment.create', compact('animalInfos','diseases'));
    }


    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'animal_info_id' => 'required',
            'disease_id' => 'required|max:155',
            'clinical_sign' => 'nullable|max:155',
            'disease_season' => 'required|max:155',
            'medicine_prescribed' => 'nullable',
            'recovered_dead' => 'required|max:155',
        ]);


        try{
            DiseaseTreatment::create($data);
            toast('Success','success');
            return redirect()->route('disease-and-treatment.index');
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        DiseaseTreatment::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
