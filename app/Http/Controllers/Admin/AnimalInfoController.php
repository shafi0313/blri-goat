<?php

namespace App\Http\Controllers\Admin;

use Excel;
use App\Models\Farm;
use App\Models\Service;
use App\Models\AnimalCat;
use App\Models\Community;
use App\Models\AnimalInfo;
use App\Models\CommunityCat;
use App\Models\Reproduction;
use Illuminate\Http\Request;
use App\Models\ProductionRecord;
use App\Exports\AnimalInfoExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AnimalInfoStoreRequest;
use App\Http\Requests\PrductionRecordStoreRequest;

class AnimalInfoController extends Controller
{
    public function exportIntoExcel()
    {
        return Excel::download(new AnimalInfoExport, 'animal_information.xlsx');
    }

    public function index()
    {
        $animalInfos = AnimalInfo::all();
        return view('admin.animal_info.index', compact('animalInfos'));
    }

    public function create()
    {
        $farms = Farm::all();
        $communityCats = CommunityCat::all();
        $goatCats = AnimalCat::where('type',1)->where('parent_id', 0)->get();
        $sheepCats = AnimalCat::where('type',2)->where('parent_id', 0)->get();
        $animalInfos = Service::all();
        return view('admin.animal_info.create', compact('farms','communityCats','goatCats','sheepCats','animalInfos'));
    }

    /**
     * Store a new blog post.
     *
     * @param  \App\Http\Requests\AnimalInfoStoreRequest  $animalInfoStoreRequest
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $animal_sub_cat_id = $request->animal_sub_cat_id;
        if($animal_sub_cat_id==0){
            $animal_sub_cat_id = null;
        }else{
            $animal_sub_cat_id = $request->animal_sub_cat_id;
        }

       $data = [
            'user_id' => Auth::user()->id,
            'farm_id' => $request->farm_id,
            'community_cat_id' => $request->community_cat_id,
            'community_id' => $request->community_id,
            'animal_cat_id' => $request->animal_cat_id,
            'animal_sub_cat_id' => $animal_sub_cat_id,
            'type' => $request->type,
            'm_type' => $request->m_type,
            'sire' => $request->sire,
            // 'dam' => $request->dam,
            'breed' => $request->breed,
            'animal_tag' => $request->animal_tag,
            'color' => $request->color,
            'sex' => $request->sex,
            'birth_wt' => $request->birth_wt,
            'litter_size' => $request->litter_size,
            // 'generation' => $request->generation,
            // 'paity' => $request->paity,
            'dam_milk' => $request->dam_milk,
            'd_o_b' => $request->d_o_b,
            'season_o_birth' => $request->season_o_birth,
            'death_date' => $request->death_date,
            'castrated' => $request->castrated,
            'remark' => $request->remark,
        ];

        $getDam = AnimalInfo::where('dam',$request->dam)->count();
        if($getDam > 0){
            $data['dam'] = $request->dam;
            $data['generation'] = $request->generation+1;
            Service::whereDoe_tag($request->dam)->latest()->update(['is_giving_birth' => 1]);
        }else{
            $data['dam'] = $request->dam_input;
            $data['generation'] = $request->generation;
        }
        $paity = Service::where('is_giving_birth',1)->count();
        $data['paity'] =  $paity + 1;

        // return $data;



        DB::beginTransaction();

        // Reproduction kidding date create or update
        if(!empty($request->dam)){
            $dbGetAnimalInfo = AnimalInfo::select(['id','dam','d_o_b'])->where('dam', $request->dam)->first();
            $dbGetReproduction = Reproduction::where('animal_info_id', $dbGetAnimalInfo->id)->first();
            if ($dbGetReproduction==null || $dbGetReproduction->count() < 1) {
                $reproduction = [
                'animal_info_id' => $dbGetAnimalInfo->id,
                'kidding_1st_date' => $request->d_o_b,
            ];
                Reproduction::create($reproduction);
            } else {
                if ($dbGetReproduction->kidding_1st_date == null) {
                    $reproduction['kidding_1st_date'] = $request->d_o_b;
                    $reproduction['litter_size_1st_kidding'] = $request->litter_size;
                } elseif ($dbGetReproduction->kidding_2nd_date == null) {
                    $reproduction['kidding_2nd_date'] = $request->d_o_b;
                    $reproduction['kidding_2nd_liter'] = $request->litter_size;
                } elseif ($dbGetReproduction->kidding_3rd_date == null) {
                    $reproduction['kidding_3rd_date'] = $request->d_o_b;
                    $reproduction['kidding_3nd_liter'] = $request->litter_size;
                } elseif ($dbGetReproduction->kidding_4th_date == null) {
                    $reproduction['kidding_4th_date'] = $request->d_o_b;
                    $reproduction['kidding_4nd_liter'] = $request->litter_size;
                } elseif ($dbGetReproduction->kidding_5th_date == null) {
                    $reproduction['kidding_5th_date'] = $request->d_o_b;
                    $reproduction['kidding_5nd_liter'] = $request->litter_size;
                } elseif ($dbGetReproduction->kidding_6th_date == null) {
                    $reproduction['kidding_6th_date'] = $request->d_o_b;
                    $reproduction['kidding_6nd_liter'] = $request->litter_size;
                }
                Reproduction::where('id', $dbGetReproduction->id)->update($reproduction);
            }
        }



        try{
            AnimalInfo::create($data);
            DB::commit();
            toast('Success','success');
            return redirect()->route('animal-info.index');
        }catch(\Exception $ex){
            DB::rollBack();
            // return $ex->getMessage();
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

    public function getAnimalCat(Request $request)
    {
        $animalCatId = $request->animalCatId;
        $animalCats = AnimalCat::where('parent_id', $animalCatId)->get();
        $animal = '';
        $animal .= '<option value="0">Select</option>';
        foreach($animalCats as $animalCat){
            $animal .= '<option value="'.$animalCat->id.'">'.$animalCat->name.'</option>';
        }
        return json_encode(['animal'=>$animal]);
    }

    public function getService(Request $request)
    {
        // $animalInfoId = $request->animalInfoId;
        $serviceInfos = Service::where('doe_tag', $request->dam_tag)->get();
        foreach($serviceInfos as $serviceInfo){
            $expected_d_o_b = $serviceInfo->expected_d_o_b;
            $generation = $serviceInfo->generation;

        }
        return json_encode(['expected_d_o_b' => $expected_d_o_b, 'generation' => $generation]);
    }
}
