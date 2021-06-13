<?php

namespace App\Http\Controllers\Admin;

use App\Models\Parasite;
use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParasiteController extends Controller
{
    public function index()
    {
        $parasites = Parasite::all();
        return view('admin.parasite.index', compact('parasites'));
    }


    public function create()
    {
        $animalInfos = AnimalInfo::all();
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
