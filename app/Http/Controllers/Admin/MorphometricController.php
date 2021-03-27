<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use App\Models\Morphometric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MorphometricController extends Controller
{
    public function index()
    {
        $morphometrics = Morphometric::all();
        return view('admin.morphometric.index', compact('morphometrics'));
    }

    public function create()
    {
        $animalInfos = AnimalInfo::all();
        return view('admin.morphometric.create', compact('animalInfos'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'animal_info_id' => 'required',
        ]);

        $data = [
            'animal_info_id' => $request->animal_info_id,
            'type' => $request->type,
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
