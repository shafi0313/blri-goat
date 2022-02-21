<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deworming;
use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DewormingController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $dewormings = Deworming::all()->groupBy('group');
        }else{
            $dewormings = Deworming::whereUser_id(Auth::user()->id)->get()->groupBy('group');
        }
        return view('admin.deworming.index', compact('dewormings'));
    }


    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $animalInfos = getAnimalInfo();
        return view('admin.deworming.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $this->validate($request, [
            'medicine_type'  => 'required',
            'medicine_name'  => 'required|max:100',
            'deworming_date'  => 'required|date',
            'dose'  => 'required|max:100',
        ]);

        $group = Deworming::max('group') + 1 ;
        $animals = AnimalInfo::whereBetween('id',[$request->to, $request->from])->get();
        foreach($animals as $key => $value){
            $data = [
                'farm_id' => $animals->pluck('farm_id')[$key],
                'community_cat_id' => $animals->pluck('community_cat_id')[$key],
                'community_id' => $animals->pluck('community_id')[$key],
                'animal_info_id' => $animals->pluck('id')[$key],
                'user_id' => Auth::user()->id,
                'group' =>  $group,
                'medicine_type' => $request->medicine_type,
                'medicine_name' => $request->medicine_name,
                'deworming_date' => $request->deworming_date,
                'dose' => $request->dose,
            ];
            $data['num_of_animal'] = count($data);
            Deworming::create($data);
        }

        try{
            toast('Success','success');
            return redirect()->route('deworming.index');
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function show($group)
    {
        $dewormings = Deworming::whereGroup($group)->get();
        return view('admin.deworming.report', compact('dewormings'));
    }

    public function destroy($id)
    {
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        Deworming::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
