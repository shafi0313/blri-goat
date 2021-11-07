<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use App\Models\Morphometric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MorphometricController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $morphometrics = Morphometric::all();
        }else{
            $morphometrics = Morphometric::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.morphometric.index', compact('morphometrics'));
    }

    public function create()
    {
        if (Auth::user()->is==1) {
            $animalInfos = AnimalInfo::all();
        }else{
            $animalInfos = AnimalInfo::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.morphometric.create', compact('animalInfos'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'animal_info_id' => 'required',
        ]);

        $data = [
            'animal_info_id' => $request->animal_info_id,
            'age' => $request->age,
            'body_lenght' => $request->body_lenght,
            'weither_height' => $request->weither_height,
            'horn_pattern' => $request->horn_pattern,
            'horn_length' => $request->horn_length,
            'tail_length' => $request->tail_length,
            'ear_length' => $request->ear_length,
            'h_girth_length' => $request->h_girth_length,
            'height_of_rump' => $request->height_of_rump,
            'head_length' => $request->head_length,
            'eye_to_eye_length' => $request->eye_to_eye_length,
        ];
        $data['user_id'] = Auth::user()->id;

        DB::beginTransaction();
        try{
            Morphometric::create($data);
            DB::commit();
            toast('Success','success');
            return redirect()->route('morphometric.index');
        }catch(\Exception $ex){
            DB::rollBack();
            toast('Error', 'error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Morphometric::find($id)->delete();
        toast('Successfully Deleted','success');
        return redirect()->back();
    }
}
