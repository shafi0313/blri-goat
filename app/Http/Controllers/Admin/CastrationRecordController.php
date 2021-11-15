<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use App\Models\CastrationRecord;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CastrationRecordController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $castrationRecords = CastrationRecord::all();
        }else{
            $castrationRecords = CastrationRecord::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.castration_record.index', compact('castrationRecords'));
    }


    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $animalInfos = getAnimalInfo();
        return view('admin.castration_record.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $data = $this->validate($request, [
            'animal_info_id' => 'required',
            'date'  => 'required|date',
        ]);

        $data['user_id'] = Auth::user()->id;


        try{
            CastrationRecord::create($data);
            toast('Success','success');
            return redirect()->route('castration-record.index');
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        CastrationRecord::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
