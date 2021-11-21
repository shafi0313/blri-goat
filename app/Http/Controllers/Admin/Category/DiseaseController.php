<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Disease;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiseaseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'disease_name'     => 'required',
        ]);

        $data = [
            'name' => $request->disease_name,
        ];
        try {
            Disease::create($data);
            $diseases = Disease::all();
            $msg = ['status'=>200,'message'=>'Measure Created!','diseases'=>$diseases];
        } catch (\Exception $e) {
            $e->getMessage();
            $msg = ['status'=>500,'message'=>'Measure Not Created!'];
        }
        return response()->json($msg);
    }
}
