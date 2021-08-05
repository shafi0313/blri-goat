<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use App\Models\DeadCulled;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeadCulledController extends Controller
{
    public function index()
    {
        $deadCulleds = DeadCulled::all();
        return view('admin.dead_culled.index', compact('deadCulleds'));
    }


    public function create()
    {
        $animalInfos = AnimalInfo::all();
        return view('admin.dead_culled.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'animal_info_id' => 'required',
            'dead_culled'  => 'required|max:20',
            'reason'  => 'required|max:255',
            'date_dead_culled'  => 'required|date',
        ]);


        try{
            DeadCulled::create($data);
            toast('Success','success');
            return redirect()->route('dead-culled.index');
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        DeadCulled::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
