<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use App\Models\DeadCulled;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeadCulledController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $deadCulleds = DeadCulled::all();
        }else{
            $deadCulleds = DeadCulled::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.dead_culled.index', compact('deadCulleds'));
    }


    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        if (Auth::user()->is==1) {
            $animalInfos = AnimalInfo::all();
        }else{
            $animalInfos = AnimalInfo::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.dead_culled.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $data = $this->validate($request, [
            'animal_info_id' => 'required',
            'dead_culled'  => 'required|max:20',
            'reason'  => 'required|max:255',
            'date_dead_culled'  => 'required|date',
        ]);
        $data['user_id'] = Auth::user()->id;

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
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        DeadCulled::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
