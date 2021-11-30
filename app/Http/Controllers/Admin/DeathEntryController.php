<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use App\Models\DeathEntry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeathEntryController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $deaths = DeathEntry::all();
        }else{
            $deaths = DeathEntry::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.death_entry.index', compact('deaths'));
    }


    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $animalInfos = getAnimalInfo();
        return view('admin.death_entry.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $data = $this->validate($request, [
            'animal_info_id'        => 'required',
            'date'                  => 'required|date',
            'date_time'             => 'required',
            'clinical_history'      => 'required',
            'clinical_findings'     => 'required',
            'species'               => 'required',
            'address'               => 'required',
            'probable_cause_death'  => 'required',
        ]);
        $data['user_id'] = Auth::user()->id;

        // $animalInfo = AnimalInfo::whereId($request->animal_info_id)->first();
        // $data['animal_cat_id'] = $animalInfo->animal_cat_id;
        // $data['animal_sub_cat_id'] = $animalInfo->animal_sub_cat_id;
        // $data['farm_id'] = $animalInfo->farm_id;
        // $data['community_id'] = $animalInfo->community_id;
        // $data['community_cat_id'] = $animalInfo->community_cat_id;
        // $data['type'] = $animalInfo->type;
        // $data['sex'] = $animalInfo->sex;

        try{
            DeathEntry::create($data);
            AnimalInfo::whereId($request->animal_info_id)->first()->update(['status' => 1]);
            toast('Success','success');
            return redirect()->route('death-entry.index');
        }catch(\Exception $ex){
            return $ex->getMessage();
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        DeathEntry::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
