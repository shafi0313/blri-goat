<?php

namespace App\Http\Controllers\Admin;

use App\Models\Upazila;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
