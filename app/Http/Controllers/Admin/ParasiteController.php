<?php

namespace App\Http\Controllers\Admin;

use App\Models\Parasite;
use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use App\Actions\FarmOrCommunityData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParasiteController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $parasites = Parasite::all();
        }else{
            $parasites = Parasite::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.parasite.index', compact('parasites'));
    }


    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $animalInfos = getAnimalInfo();
        return view('admin.parasite.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $data = $this->validate($request, [
            'animal_info_id' => 'required',
            'feces_collection_date'  => 'required|date',
            'fecal_egg_count'  => 'required',
            'fecal_test'  => 'required',
            'season'  => 'required|max:100',
            'parasite_name'  => 'required|max:100',
        ]);
        $data['user_id'] = Auth::user()->id;
        $farmOrCommunityData = FarmOrCommunityData::getFarmOrCommunityData($request->animal_info_id);

        try{
            Parasite::create($data+$farmOrCommunityData);
            toast('Success','success');
            return redirect()->route('parasite.index');
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        Parasite::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
