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
        $data = $this->validate($request, [
            'animal_info_id' => 'required',
            'medicine_name'  => 'required|max:100',
            'dipping_date'  => 'required|date',
        ]);
        $data['user_id'] = Auth::user()->id;

        try{
            Dipping::create($data);
            toast('Success','success');
            return redirect()->route('dipping.index');
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Dipping::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
