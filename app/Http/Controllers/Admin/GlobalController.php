<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Upazila;
use App\Models\District;
use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnimalCat;

class GlobalController extends Controller
{
    public function upazila(Request $request)
    {
        $district_id = $request->district_id;
        $districts = Upazila::where('district_id', $district_id)->get();
        $dis = '';
        $dis .= '<option value="0">Select</option>';
        foreach($districts as $district){
            $dis .= '<option value="'.$district->id.'">'.$district->name.'</option>';
        }
        return json_encode(['dis'=>$dis]);
    }

    public function getAnimalInfo(Request $request)
    {
        $animalInfoId = $request->animalInfoId;
        $animalInfos = AnimalInfo::where('id', $animalInfoId)->get();
        foreach($animalInfos as $animalInfo){
            $sex = $animalInfo->sex;
            $color = $animalInfo->color;
            $birth_wt = $animalInfo->birth_wt;
            $type = $animalInfo->type;
            $d_o_b = Carbon::parse($animalInfo->d_o_b)->format('Y-m-d');
            $paity = $animalInfo->paity;
            $litter_size = $animalInfo->litter_size;
            $breed = $animalInfo->breed;
        }
        return json_encode(['sex'=>$sex, 'color'=>$color, 'birth_wt'=>$birth_wt, 'type'=>$type, 'd_o_b'=>$d_o_b, 'paity'=>$paity, 'litter_size'=>$litter_size, 'breed'=>$breed]);
    }



    public function animalSubCat(Request $request)
    {
        $p_id = $request->animal_cat_id;
        $animalCats = AnimalCat::where('parent_id', $p_id)->get();
        $name = '';
        $name .= '<option value="0">Select</option>';
        foreach($animalCats as $animalCat){
            $name .= '<option value="'.$animalCat->id.'">'.$animalCat->name.'</option>';
        }
        return json_encode(['name'=>$name]);
    }
}
