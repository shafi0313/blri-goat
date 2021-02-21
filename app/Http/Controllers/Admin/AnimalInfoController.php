<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\CommunityCat;
use App\Models\Farm;

class AnimalInfoController extends Controller
{
    public function user()
    {
        $users = User::where('type', 2)->get();
        return view('admin.animal_info.user', compact('users'));
    }
    public function index()
    {

        $animalInfos = AnimalInfo::all();
        return view('admin.animal_info.index', compact('animalInfos'));
    }

    public function createId(User $user)
    {
        $user = User::find($user->id);
        $farms = Farm::all();
        $communityCats = CommunityCat::all();

        return view('admin.animal_info.create', compact('farms','communityCats'));
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
