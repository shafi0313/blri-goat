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
        $dewormings = Deworming::all();
        return view('admin.deworming.index', compact('dewormings'));
    }


    public function create()
    {
        $animalInfos = AnimalInfo::all();
        return view('admin.deworming.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'medicine_name'  => 'required|max:100',
            'deworming_date'  => 'required|date',
            'dose'  => 'required|max:100',
        ]);
        $data['user_id'] = Auth::user()->id;

        $animals = AnimalInfo::whereBetween('id',[$request->to, $request->from])->get()->pluck('id');
        foreach($animals as $key => $value){
            $data = [
                'animal_info_id' => $animals[$key],
                'user_id' => Auth::user()->id,
                'medicine_name' => $request->medicine_name,
                'deworming_date' => $request->deworming_date,
                'dose' => $request->dose,
            ];
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

    public function show($deworming_date)
    {
        $dewormings = Deworming::whereDeworming_date($deworming_date)->get();
        return view('admin.deworming.report', compact('dewormings'));
    }

    public function destroy($id)
    {
        Deworming::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
