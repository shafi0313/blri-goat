<?php

namespace App\Http\Controllers\Admin;

use App\Models\Farm;
use App\Models\User;
use App\Models\Community;
use App\Models\AnimalInfo;
use App\Models\CommunityCat;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Models\ProductionRecord;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalInfoStoreRequest;
use App\Http\Requests\PrductionRecordStoreRequest;

class AnimalInfoController extends Controller
{
    public function user()
    {
        $users = User::where('type', 2)->get();
        return view('admin.animal_info.user', compact('users'));
    }
    
    public function individualIndex($id)
    {
        $animalInfos = AnimalInfo::where('user_id', $id)->get();
        return view('admin.animal_info.index', compact('animalInfos'));
    }

    public function createId(User $user)
    {
        $user = User::find($user->id);
        $farms = Farm::all();
        $communityCats = CommunityCat::all();

        return view('admin.animal_info.create', compact('user','farms','communityCats'));
    }

    /**
     * Store a new blog post.
     *
     * @param  \App\Http\Requests\AnimalInfoStoreRequest  $animalInfoStoreRequest
     * @return Illuminate\Http\Response
     */
    public function store(AnimalInfoStoreRequest $animalInfoStoreRequest, PrductionRecordStoreRequest $productionRecordStore )
    {
        $animalInfo = $animalInfoStoreRequest->validated();
        DB::beginTransaction();

        $animalStore = AnimalInfo::create($animalInfo);
        $productionRecord = $productionRecordStore->validated();
        $productionRecord = ['animal_info_id' => $animalStore->id];
        ProductionRecord::create($productionRecord);
        try{
            DB::commit();
            toast('Success','success');
            return redirect()->route('animal-info.index');
        }catch(\Exception $ex){
            DB::rollBack();
            toast('Error', 'error');
            return redirect()->back();
        }
    }

    public function getCommunity(Request $request)
    {
        $communityCatId = $request->communityCatId;
        $Communities = Community::where('community_cat_id', $communityCatId)->get();
        $com = '';
        $com .= '<option value="0">Select</option>';
        foreach($Communities as $community){
            $com .= '<option value="'.$community->id.'">'.$community->name.'</option>';
        }
        return json_encode(['com'=>$com]);
    }
}
