<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use App\Models\Distribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DistributionController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
             $distributions = Distribution::all();
        }else{
             $distributions = Distribution::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.distribution.index', compact('distributions'));
    }

    public function create()
    {
        if (Auth::user()->is==1) {
            $animalInfos = AnimalInfo::all();
        }else{
            $animalInfos = AnimalInfo::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.distribution.create', compact('animalInfos'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'animal_info_id' => 'required',
        ]);

        $data = [
            'animal_info_id' => $request->animal_info_id,
            'dis_date' => $request->dis_date,
            'address_of_rec' => $request->address_of_rec,
            'purpose' => $request->purpose,
        ];
        $data['user_id'] = Auth::user()->id;

        DB::beginTransaction();
        try{
            Distribution::create($data);
            DB::commit();
            toast('Success','success');
            return redirect()->route('distribution.index');
        }catch(\Exception $ex){
            DB::rollBack();
            toast('Error', 'error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Distribution::find($id)->delete();
        toast('Successfully Deleted','success');
        return redirect()->back();
    }
}
