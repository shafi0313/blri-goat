<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use App\Models\DeathEntry;
use Illuminate\Http\Request;
use App\Actions\FarmOrCommunityData;
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
            'death_time'            => 'required',
            'clinical_history'      => 'required',
            'clinical_findings'     => 'required',
            'species'               => 'required',
            'address'               => 'required',
            'probable_cause_death'  => 'required',
        ]);
        $data['user_id'] = Auth::user()->id;
        $farmOrCommunityData = FarmOrCommunityData::getFarmOrCommunityData($request->animal_info_id);

        try{
            DeathEntry::create($data+$farmOrCommunityData);
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
