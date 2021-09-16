<?php

namespace App\Http\Controllers\Admin;

use App\Models\Disease;
use App\Models\AnimalInfo;
use App\Models\ClinicalSign;
use Illuminate\Http\Request;
use App\Models\DiseaseTreatment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $clinicalSigns = ClinicalSign::all();
        return view('admin.disease_treatment.create', compact('animalInfos','diseases','clinicalSigns'));
    }


    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'animal_info_id' => 'required',
            'animal_cat_id' => 'required',
            'animal_sub_cat_id' => 'sometimes',
            'type' => 'required',
            'disease_id' => 'required|max:155',
            'clinical_sign_id' => 'nullable|max:155',
            'disease_season' => 'required|max:155',
            'medicine_prescribed' => 'nullable',
            'disease_date' => 'required|date',
            'recovered_dead' => 'required|max:155',
        ]);
        $data['user_id'] = Auth::user()->id;
        try{
            DiseaseTreatment::create($data);
            toast('Success','success');
            return redirect()->route('disease-and-treatment.index');
        }catch(\Exception $ex){
            toast($ex->getMessage().'Failed','error');
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
