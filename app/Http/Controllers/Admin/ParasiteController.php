<?php

namespace App\Http\Controllers\Admin;

use App\Models\Parasite;
use App\Models\AnimalInfo;
use Illuminate\Http\Request;
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
        if (Auth::user()->is==1) {
            $animalInfos = AnimalInfo::all();
        }else{
            $animalInfos = AnimalInfo::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.parasite.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'animal_info_id' => 'required',
            'feces_collection_date'  => 'required|date',
            'fecal_egg_count'  => 'required',
            'season'  => 'required|max:100',
            'parasite_name'  => 'required|max:100',
        ]);
        $data['user_id'] = Auth::user()->id;


        try{
            Parasite::create($data);
            toast('Success','success');
            return redirect()->route('parasite.index');
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Parasite::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
