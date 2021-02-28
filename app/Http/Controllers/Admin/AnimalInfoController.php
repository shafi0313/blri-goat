<?php

namespace App\Http\Controllers\Admin;

use App\Models\Farm;
use App\Models\Community;
use App\Models\AnimalInfo;
use App\Models\CommunityCat;
use Illuminate\Http\Request;
use App\Models\ProductionRecord;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalInfoStoreRequest;
use App\Http\Requests\PrductionRecordStoreRequest;

class AnimalInfoController extends Controller
{
    public function index()
    {
        $animalInfos = AnimalInfo::all();
        return view('admin.animal_info.index', compact('animalInfos'));
    }

    public function create()
    {
        $farms = Farm::all();
        $communityCats = CommunityCat::all();
        return view('admin.animal_info.create', compact('farms','communityCats'));
    }

    /**
     * Store a new blog post.
     *
     * @param  \App\Http\Requests\AnimalInfoStoreRequest  $animalInfoStoreRequest
     * @return Illuminate\Http\Response
     */
    public function store(AnimalInfoStoreRequest $animalInfoStoreRequest)
    {
        $animalInfo = $animalInfoStoreRequest->validated();
        DB::beginTransaction();



        try{
            AnimalInfo::create($animalInfo);
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
