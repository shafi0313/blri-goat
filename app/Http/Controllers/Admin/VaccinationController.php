<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VaccinationController extends Controller
{
    public function index()
    {
        $diseaseTreatments = DiseaseTreatment::all();
        return view('admin.disease_treatment.index', compact('diseaseTreatments'));
    }


    public function create()
    {
        $animalInfos = AnimalInfo::all();
        return view('admin.disease_treatment.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'animal_info_id' => 'required',
            'type' => 'required',
            'breed' => 'required|max:50',
            'disease_name' => 'required|max:155',
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
