<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use App\Models\DeadCulled;
use App\Models\CommunityCat;
use Illuminate\Http\Request;
use App\Actions\FarmOrCommunityData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeadCulledController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $deadCulleds = DeadCulled::all();
        }else{
            $deadCulleds = DeadCulled::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.dead_culled.index', compact('deadCulleds'));
    }


    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $animalInfos = getAnimalInfo();
        return view('admin.dead_culled.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $data = $this->validate($request, [
            'animal_info_id' => 'required',
            'dead_culled'  => 'required|max:20',
            'reason'  => 'required|max:255',
            'date_dead_culled'  => 'required|date',
        ]);
        $data['user_id'] = Auth::user()->id;

        $animalInfo = AnimalInfo::whereId($request->animal_info_id)->first();
        $data['animal_cat_id'] = $animalInfo->animal_cat_id;
        $data['animal_sub_cat_id'] = $animalInfo->animal_sub_cat_id;
        $data['farm_id'] = $animalInfo->farm_id;
        $data['community_id'] = $animalInfo->community_id;
        $data['community_cat_id'] = $animalInfo->community_cat_id;
        $data['type'] = $animalInfo->type;
        $data['sex'] = $animalInfo->sex;

        if($request->dead_culled == 'Death'){
            AnimalInfo::whereId($request->animal_info_id)->first()->update([
                'status' => 1,
            ]);
        }
        $farmOrCommunityData = FarmOrCommunityData::getFarmOrCommunityData($request->animal_info_id);

        try{
            DeadCulled::create($data+$farmOrCommunityData);
            toast('Success','success');
            return redirect()->route('dead-culled.index');
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        DeadCulled::find($id)->delete();
        toast('Success','success');
        return redirect()->back();
    }
}
