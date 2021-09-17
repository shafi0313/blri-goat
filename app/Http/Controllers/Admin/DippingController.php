<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dipping;
use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DippingController extends Controller
{
    public function index()
    {
        $dippings = Dipping::all();
        return view('admin.dipping.index', compact('dippings'));
    }


    public function create()
    {
        $animalInfos = AnimalInfo::all();
        return view('admin.dipping.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'medicine_name'  => 'required|max:100',
            'dipping_date'  => 'required|date',
        ]);

        $animals = AnimalInfo::whereBetween('id',[$request->to, $request->from])->get()->pluck('id');
        foreach($animals as $key => $value){
            $data = [
                'animal_info_id' => $animals[$key],
                'user_id' => Auth::user()->id,
                'medicine_name' => $request->medicine_name,
                'dipping_date' => $request->dipping_date,
            ];
            Dipping::create($data);
        }

        try{
            toast('Success','success');
            return redirect()->route('dipping.index');
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function show($dipping_date)
    {
        $dippings = Dipping::wheredipping_date($dipping_date)->get();
        return view('admin.dipping.report', compact('dippings'));
    }

    public function destroy($id)
    {
        Dipping::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
