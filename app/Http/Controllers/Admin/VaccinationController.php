<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use App\Models\Vaccination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VaccinationController extends Controller
{
    public function index()
    {
        $vaccinations = Vaccination::all();
        return view('admin.vaccination.index', compact('vaccinations'));
    }


    public function create()
    {
        $animalInfos = AnimalInfo::all();
        return view('admin.vaccination.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'animal_info_id' => 'required',
            'vaccine_name' => 'required|max:155',
            'vaccine_date' => 'required|date',
            'dose' => 'nullable|max:155',
            'total_vaccinated' => 'nullable|max:155',
        ]);


        try{
            Vaccination::create($data);
            toast('Success','success');
            return redirect()->route('vaccination.index');
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Vaccination::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
