<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use App\Models\Morphometric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Actions\FarmOrCommunityData;
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
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $animalInfos = getAnimalInfo();
        return view('admin.morphometric.create', compact('animalInfos'));
    }

    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $this->validate($request, [
            'animal_info_id' => 'required',
        ]);

        $data = [
            'animal_info_id' => $request->animal_info_id,
            'age' => $request->age,
            'body_lenght' => $request->body_lenght,
            'weither_height' => $request->weither_height,
            'horn_pattern' => $request->horn_pattern,
            'scrotum_length' => $request->scrotum_length,
            'scrotum_diameter' => $request->scrotum_diameter,
            'rump_height' => $request->rump_height,
            'rump_weight' => $request->rump_weight,
            'rump_length' => $request->rump_length,
            'horn_length' => $request->horn_length,
            'tail_length' => $request->tail_length,
            'ear_length' => $request->ear_length,
            'h_girth_length' => $request->h_girth_length,
            'height_of_rump' => $request->height_of_rump,
            'head_length' => $request->head_length,
            'eye_to_eye_length' => $request->eye_to_eye_length,
        ];
        $data['user_id'] = Auth::user()->id;
        $farmOrCommunityData = FarmOrCommunityData::getFarmOrCommunityData($request->animal_info_id);

        DB::beginTransaction();
        try{
            Morphometric::create($data + $farmOrCommunityData);
            DB::commit();
            toast('Success','success');
            return redirect()->route('morphometric.index');
        }catch(\Exception $ex){
            // return $ex->getMessage();
            DB::rollBack();
            toast('Error', 'error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $animalInfos = getAnimalInfo();
        $data = Morphometric::find($id);
        return view('admin.morphometric.edit', compact('animalInfos','data'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $this->validate($request, [
            'animal_info_id' => 'required',
        ]);

        $data = [
            'animal_info_id' => $request->animal_info_id,
            'age' => $request->age,
            'body_lenght' => $request->body_lenght,
            'weither_height' => $request->weither_height,
            'horn_pattern' => $request->horn_pattern,
            'scrotum_length' => $request->scrotum_length,
            'scrotum_diameter' => $request->scrotum_diameter,
            'rump_height' => $request->rump_height,
            'rump_weight' => $request->rump_weight,
            'rump_length' => $request->rump_length,
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
            Morphometric::find($id)->update($data);
            DB::commit();
            toast('Success','success');
            return redirect()->route('morphometric.index');
        }catch(\Exception $ex){
            return $ex->getMessage();
            DB::rollBack();
            toast('Error', 'error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        Morphometric::find($id)->delete();
        toast('Successfully Deleted','success');
        return redirect()->back();
    }
}
