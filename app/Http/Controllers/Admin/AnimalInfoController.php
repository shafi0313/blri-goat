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
use App\Exports\AnimalInfoExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AnimalInfoController extends Controller
{
    public function downloadSelect()
    {
        if (Auth::user()->is == 1) {
            $farms = Farm::all(['id', 'name']);
            $communityCats = CommunityCat::select(['id', 'name'])->get();
            return view('admin.animal_info.download_select', compact('farms', 'communityCats'));
        } else {
            $communities = Community::whereCommunity_cat_id(CommunityCat::whereUser_id(Auth::user()->id)->first('id')->id)->get(['id', 'no', 'name']);
            return view('admin.animal_info.download_select', compact('communities'));
        }
    }

    public function exportIntoExcel(Request $request)
    {
        $fOrC = preg_replace('/[^a-z A-Z]/', '', $request->farmOrCommunityId);
        $farmOrComId = preg_replace('/[^0-9]/', '', $request->farmOrCommunityId);
        $community_id = $request->community_id;
        if ($fOrC == 'f') {
            $farm = 'farm_id';
        } else {
            $farm = 'community_cat_id';
        }
        // return Excel::download(new AnimalInfoExport, 'animal_information.xlsx');
        return Excel::download(new AnimalInfoExport($farm, $farmOrComId, $community_id), 'animal_information.xlsx');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            if (Auth::user()->is == 1) {
                $animalInfos = AnimalInfo::with(['animalCat', 'farm', 'communityCat'])->latest();
            } else {
                $animalInfos = AnimalInfo::with(['animalCat', 'communityCat'])->whereUser_id(Auth::user()->id)->latest();
            }
            return DataTables::of($animalInfos)
                ->addIndexColumn()
                ->addColumn('farm', function ($row) {
                    return $row->farm != null ? $row->farm->name : ($row->community_cat_id != null ? $row->communityCat->name : '');
                })
                ->addColumn('animalCatName', function ($row) {
                    return $row->animalCat->name;
                })
                ->addColumn('d_o_b', function ($row) {
                    return bdDate($row->d_o_b);
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= view('button', ['type' => 'edit', 'route' => 'animal-info', 'row' => $row]);
                    $btn .= view('button', ['type' => 'ajax-delete', 'route' => route('animal-info.destroy', $row->id), 'row' => $row, 'src' => 'dt']);
                    return $btn;
                })
                ->rawColumns(['created_at', 'action'])
                ->make(true);
        }

        // return view('admin.animal_info.index', compact('animalInfos'));
        return view('admin.animal_info.index');
    }

    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        if (Auth::user()->is == 1) {
            $farms         = Farm::all();
            $communityCats = CommunityCat::all();
            $goatCats      = AnimalCat::where('type', 1)->where('parent_id', 0)->get();
            $sheepCats     = AnimalCat::where('type', 2)->where('parent_id', 0)->get();
            $services      = Service::whereIs_giving_birth(0)->latest()->get();
            return view('admin.animal_info.create', compact('farms', 'communityCats', 'goatCats', 'sheepCats', 'services'));
        } else {
            $communityCats = CommunityCat::whereUser_id(Auth::user()->id)->first();
            $communitys    = Community::whereCommunity_cat_id($communityCats->id)->get();
            $goatCats      = AnimalCat::where('type', 1)->where('parent_id', 0)->get();
            $sheepCats     = AnimalCat::where('type', 2)->where('parent_id', 0)->get();
            $services      = Service::whereUser_id(Auth::user()->id)->whereIs_giving_birth(0)->latest()->get();
            return view('admin.animal_info.create_user', compact('communitys', 'goatCats', 'sheepCats', 'services'));
        }
    }

    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }

        $this->validate($request, [
            'animal_cat_id' => 'required|integer',
            'animal_tag'    => 'required',
            'sex'           => 'required',
            'generation'    => 'required',
        ]);

        $animal_sub_cat_id = $request->animal_sub_cat_id;
        if ($animal_sub_cat_id == 0) {
            $animal_sub_cat_id = null;
        } else {
            $animal_sub_cat_id = $request->animal_sub_cat_id;
        }
        DB::beginTransaction();
        $data = [
            'user_id'           => Auth::user()->id,
            'animal_cat_id'     => $request->animal_cat_id,
            'animal_sub_cat_id' => $animal_sub_cat_id,
            'type'              => $request->type,
            'm_type'            => $request->m_type,
            'sire'              => $request->sire,
            'breed'             => $request->breed,
            'animal_tag'        => $request->animal_tag,
            'color'             => $request->color,
            'sex'               => $request->sex,
            'birth_wt'          => $request->birth_wt,
            'd_o_b'             => $request->d_o_b,
            'season_o_birth'    => $request->season_o_birth,
            'remark'            => $request->remark,
        ];

        $communityCats = CommunityCat::whereUser_id(Auth::user()->id)->first();
        if (Auth::user()->is == 1) {
            $data['farm_id']          = $request->farm_id;
            $data['community_cat_id'] = $request->community_cat_id;
            $data['community_id']     = $request->community_id;
        } else {
            $data['community_cat_id'] = $communityCats->id;
            $data['community_id']     = $request->community_id;
        }

        $getDam = AnimalInfo::where('dam', $request->dam)->count();
        if ($getDam > 0) {
            $data['dam']        = $request->dam;
            $data['generation'] = $request->generation + 1;
        } else {
            $data['dam']        = $request->dam_input;
            $data['generation'] = $request->generation;
        }
        $paity = Service::where('is_giving_birth', 1)->count();
        $data['paity'] =  $paity + 1;

        if ($request->litter_size != -1) {
            $data['litter_size'] = $request->litter_size;
        } else {
            $data['litter_size'] = $request->litter_size_input;
        }
        AnimalInfo::create($data);

        if ($request->dam != 'Select' && empty($request->dam_input)) {
            Service::whereDoe_tag($request->dam)->latest()->first()->update(['is_giving_birth' => 1]) || null;
            $dbGetReproduction = Reproduction::whereAnimal_info_id($request->dam)->first();
            if ($dbGetReproduction->kidding_1st_date == null) {
                $reproduction['kidding_1st_date']        = $request->d_o_b;
                $reproduction['litter_size_1st_kidding'] = $request->litter_size;
            } elseif ($dbGetReproduction->kidding_2nd_date == null) {
                $reproduction['kidding_2nd_date']  = $request->d_o_b;
                $reproduction['kidding_2nd_liter'] = $request->litter_size;
            } elseif ($dbGetReproduction->kidding_3rd_date == null) {
                $reproduction['kidding_3rd_date']  = $request->d_o_b;
                $reproduction['kidding_3rd_liter'] = $request->litter_size;
            } elseif ($dbGetReproduction->kidding_4th_date == null) {
                $reproduction['kidding_4th_date']  = $request->d_o_b;
                $reproduction['kidding_4th_liter'] = $request->litter_size;
            } elseif ($dbGetReproduction->kidding_5th_date == null) {
                $reproduction['kidding_5th_date']  = $request->d_o_b;
                $reproduction['kidding_5th_liter'] = $request->litter_size;
            } elseif ($dbGetReproduction->kidding_6th_date == null) {
                $reproduction['kidding_6th_date']  = $request->d_o_b;
                $reproduction['kidding_6th_liter'] = $request->litter_size;
            } elseif ($dbGetReproduction->kidding_7th_date == null) {
                $reproduction['kidding_7th_date']  = $request->d_o_b;
                $reproduction['kidding_7th_liter'] = $request->litter_size;
            } elseif ($dbGetReproduction->kidding_8th_date == null) {
                $reproduction['kidding_8th_date']  = $request->d_o_b;
                $reproduction['kidding_8th_liter'] = $request->litter_size;
            } elseif ($dbGetReproduction->kidding_9th_date == null) {
                $reproduction['kidding_9th_date']  = $request->d_o_b;
                $reproduction['kidding_9th_liter'] = $request->litter_size;
            } elseif ($dbGetReproduction->kidding_10th_date == null) {
                $reproduction['kidding_10th_date']  = $request->d_o_b;
                $reproduction['kidding_10th_liter'] = $request->litter_size;
            }
            Reproduction::whereAnimal_info_id($request->dam)->update($reproduction);
        }

        try {
            DB::commit();
            toast('Success', 'success');
            return redirect()->route('animal-info.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            toast('Error', 'error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        if (Auth::user()->is == 1) {
            $farms         = Farm::all();
            $communityCats = CommunityCat::all();
            $goatCats      = AnimalCat::where('type', 1)->where('parent_id', 0)->get();
            $sheepCats     = AnimalCat::where('type', 2)->where('parent_id', 0)->get();
            $services      = Service::whereIs_giving_birth(0)->latest()->get();
            $data          = AnimalInfo::find($id);
            return view('admin.animal_info.edit', compact('farms', 'communityCats', 'goatCats', 'sheepCats', 'services', 'data'));
        } else {
            $communityCats = CommunityCat::whereUser_id(Auth::user()->id)->first();
            $communitys    = Community::whereCommunity_cat_id($communityCats->id)->get();
            $goatCats      = AnimalCat::where('type', 1)->where('parent_id', 0)->get();
            $sheepCats     = AnimalCat::where('type', 2)->where('parent_id', 0)->get();
            $services      = Service::whereUser_id(Auth::user()->id)->whereIs_giving_birth(0)->latest()->get();
            $data          = AnimalInfo::find($id);
            return view('admin.animal_info.edit_user', compact('communitys', 'goatCats', 'sheepCats', 'services', 'data'));
        }
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }

        $this->validate($request, [
            'animal_cat_id' => 'required',
            'animal_tag'    => 'required',
            'sex'           => 'required',
            'generation'    => 'required',
        ]);

        $animal_sub_cat_id = $request->animal_sub_cat_id;
        if ($animal_sub_cat_id == 0) {
            $animal_sub_cat_id = null;
        } else {
            $animal_sub_cat_id = $request->animal_sub_cat_id;
        }
        DB::beginTransaction();
        $data = [
            'user_id'        => Auth::user()->id,
            'animal_cat_id'  => $request->animal_cat_id,
            'type'           => $request->type,
            'm_type'         => $request->m_type,
            'sire'           => $request->sire,
            'breed'          => $request->breed,
            'animal_tag'     => $request->animal_tag,
            'color'          => $request->color,
            'sex'            => $request->sex,
            'birth_wt'       => $request->birth_wt,
            'd_o_b'          => $request->d_o_b,
            'season_o_birth' => $request->season_o_birth,
            'remark'         => $request->remark,
        ];

        $request->animal_sub_cat_id != '' ? $data['animal_sub_cat_id'] = $animal_sub_cat_id : false;

        $communityCats = CommunityCat::whereUser_id(Auth::user()->id)->first();
        if (Auth::user()->is == 1) {
            $data['farm_id']           = $request->farm_id;
            $data['community_cat_id']  = $request->community_cat_id;
            $request->community_id != '' ? $data['community_id'] = $request->community_id : false;
        } else {
            $data['community_cat_id'] = $communityCats->id;
            $request->community_id != '' ? $data['community_id'] = $request->community_id : false;
        }

        $getDam = AnimalInfo::where('dam', $request->dam)->count();
        if ($getDam > 0) {
            $request->dam != '' ? $data['dam'] = $request->dam : false;
            $data['generation'] = $request->generation + 1;
        } else {
            $request->dam_input != '' ? $data['dam'] = $request->dam_input : false;
            $data['generation'] = $request->generation;
        }
        $paity = Service::where('is_giving_birth', 1)->count();
        $data['paity'] =  $paity + 1;

        if ($request->litter_size != -1) {
            $data['litter_size'] = $request->litter_size;
        } else {
            $data['litter_size'] = $request->litter_size_input;
        }
        // return $data;

        $animalInfo = AnimalInfo::find($id)->update($data);

        // if($request->dam!='Select'){
        //     Service::whereDoe_tag($request->dam)->latest()->first()->update(['is_giving_birth'=>1]) || null;
        //     $dbGetReproduction = Reproduction::whereAnimal_info_id($request->dam)->first();
        //     if ($dbGetReproduction->kidding_1st_date == null) {
        //         $reproduction['kidding_1st_date'] = $request->d_o_b;
        //         $reproduction['litter_size_1st_kidding'] = $request->litter_size;
        //     } elseif ($dbGetReproduction->kidding_2nd_date == null) {
        //         $reproduction['kidding_2nd_date'] = $request->d_o_b;
        //         $reproduction['kidding_2nd_liter'] = $request->litter_size;
        //     } elseif ($dbGetReproduction->kidding_3rd_date == null) {
        //         $reproduction['kidding_3rd_date'] = $request->d_o_b;
        //         $reproduction['kidding_3rd_liter'] = $request->litter_size;
        //     } elseif ($dbGetReproduction->kidding_4th_date == null) {
        //         $reproduction['kidding_4th_date'] = $request->d_o_b;
        //         $reproduction['kidding_4th_liter'] = $request->litter_size;
        //     } elseif ($dbGetReproduction->kidding_5th_date == null) {
        //         $reproduction['kidding_5th_date'] = $request->d_o_b;
        //         $reproduction['kidding_5th_liter'] = $request->litter_size;
        //     } elseif ($dbGetReproduction->kidding_6th_date == null) {
        //         $reproduction['kidding_6th_date'] = $request->d_o_b;
        //         $reproduction['kidding_6th_liter'] = $request->litter_size;
        //     } elseif ($dbGetReproduction->kidding_7th_date == null) {
        //         $reproduction['kidding_7th_date'] = $request->d_o_b;
        //         $reproduction['kidding_7th_liter'] = $request->litter_size;
        //     } elseif ($dbGetReproduction->kidding_8th_date == null) {
        //         $reproduction['kidding_8th_date'] = $request->d_o_b;
        //         $reproduction['kidding_8th_liter'] = $request->litter_size;
        //     } elseif ($dbGetReproduction->kidding_9th_date == null) {
        //         $reproduction['kidding_9th_date'] = $request->d_o_b;
        //         $reproduction['kidding_9th_liter'] = $request->litter_size;
        //     } elseif ($dbGetReproduction->kidding_10th_date == null) {
        //         $reproduction['kidding_10th_date'] = $request->d_o_b;
        //         $reproduction['kidding_10th_liter'] = $request->litter_size;
        //     }
        //     Reproduction::whereAnimal_info_id($request->dam)->update($reproduction);
        // }

        try {
            DB::commit();
            toast('Success', 'success');
            return redirect()->route('animal-info.index');
        } catch (\Exception $ex) {
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
        $com = '<option value="">Select</option>';
        foreach ($Communities as $community) {
            $select = $request->community_cat_id == $community->community_cat_id ? 'selected' : '';
            $com .= "<option value='$community->id' $select>$community->name</option>";
        }
        return json_encode(['com' => $com]);
    }

    public function getAnimalCat(Request $request)
    {
        $animalCatId = $request->animalCatId;
        $animalCats = AnimalCat::where('parent_id', $animalCatId)->get();
        $animal = '<option value="">Select</option>';
        foreach ($animalCats as $animalCat) {
            $select = $request->animal_cat_id == $animalCat->parent_id ? 'selected' : '';
            $animal .= "<option value='$animalCat->id' $select>$animalCat->name</option>";
        }
        return json_encode(['animal' => $animal]);
    }

    public function getService(Request $request)
    {
        $serviceInfos = Service::where('doe_tag', $request->dam_tag)->get();
        foreach ($serviceInfos as $serviceInfo) {
            $expected_d_o_b = $serviceInfo->expected_d_o_b;
            $generation     = $serviceInfo->generation;
            $buck_tag       = $serviceInfo->buckTag->animal_tag;
        }
        return json_encode(['expected_d_o_b' => $expected_d_o_b, 'generation' => $generation, 'buck_tag' => $buck_tag]);
    }

    public function destroy($id)
    {
        try {
            AnimalInfo::find($id)->delete();
            return response()->json(['message' => 'The information has been deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again'], 500);
        }
    }
}
