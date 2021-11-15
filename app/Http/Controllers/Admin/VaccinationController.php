<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use App\Models\Vaccination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VaccinationController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $vaccinations = Vaccination::all();
        }else{
            $vaccinations = Vaccination::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.vaccination.index', compact('vaccinations'));
    }


    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $animalInfos = getAnimalInfo();
        return view('admin.vaccination.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $this->validate($request, [
            // 'animal_info_id' => 'required',
            'vaccine_name' => 'required|max:155',
            'vaccine_date' => 'required|date',
            'dose' => 'required|max:155',
            'total_vaccinated' => 'required|max:155',
        ]);

        $animals = AnimalInfo::whereBetween('id',[$request->to, $request->from])->get()->pluck('id');
        foreach($animals as $key => $value){
            $data = [
                'animal_info_id' => $animals[$key],
                'user_id' => Auth::user()->id,
                'vaccine_name' => $request->vaccine_name,
                'vaccine_date' => $request->vaccine_date,
                'dose' => $request->dose,
                'total_vaccinated' => $request->total_vaccinated,
            ];
            Vaccination::create($data);
        }

        try{
            toast('Success','success');
            return redirect()->route('vaccination.index');
        }catch(\Exception $ex){
            return $ex->getMessage();
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function show($vaccine_date)
    {
        $vaccinations = Vaccination::whereVaccine_date($vaccine_date)->get();
        return view('admin.vaccination.report', compact('vaccinations'));
    }

    public function destroy($id)
    {
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        Vaccination::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
