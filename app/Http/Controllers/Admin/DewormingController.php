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
        $data = $this->validate($request, [
            'animal_info_id' => 'required',
            'medicine_name'  => 'required|max:100',
            'deworming_date'  => 'required|date',
            'dose'  => 'required|max:100',
        ]);
        $data['user_id'] = Auth::user()->id;

        try{
            Deworming::create($data);
            toast('Success','success');
            return redirect()->route('deworming.index');
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Deworming::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
