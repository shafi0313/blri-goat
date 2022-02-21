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
        if (Auth::user()->is==1) {
            $dippings = Dipping::all();
        }else{
            $dippings = Dipping::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.dipping.index', compact('dippings'));
    }


    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $animalInfos = getAnimalInfo();
        return view('admin.dipping.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $this->validate($request, [
            'medicine_name'  => 'required|max:100',
            'dipping_date'  => 'required|date',
        ]);

        $group = Dipping::max('group') + 1 ;
        $animals = AnimalInfo::whereBetween('id',[$request->to, $request->from])->get();
        foreach($animals as $key => $value){
            $data = [
                'farm_id' => $animals->pluck('farm_id')[$key],
                'community_cat_id' => $animals->pluck('community_cat_id')[$key],
                'community_id' => $animals->pluck('community_id')[$key],
                'animal_info_id' => $animals->pluck('id')[$key],
                'user_id' => Auth::user()->id,
                'group' =>  $group,
                'medicine_name' => $request->medicine_name,
                'dipping_date' => $request->dipping_date,
            ];
            $data['num_of_animal'] = count($data);
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

    public function show($group)
    {
        $dippings = Dipping::whereGroup($group)->get();
        return view('admin.dipping.report', compact('dippings'));
    }

    public function destroy($id)
    {
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        Dipping::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
