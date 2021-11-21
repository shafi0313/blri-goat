<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\ClinicalSign;
use Illuminate\Http\Request;

class ClinicalSignController extends Controller
{
    public function index()
    {
        $clinicalSigns = ClinicalSign::all();
        return view('admin.category.clinical_sign.index', compact('clinicalSigns'));
    }

    public function create()
    {
        return view('admin.animal_cat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'clinical_sign_name'     => 'required',
        ]);

        $data = [
            'name' => $request->clinical_sign_name,
        ];
        try {
            ClinicalSign::create($data);
            $clinicalSigns = ClinicalSign::all();
            $msg = ['status'=>200,'message'=>'Measure Created!','clinicalSigns'=>$clinicalSigns];
        } catch (\Exception $e) {
            $e->getMessage();
            $msg = ['status'=>500,'message'=>'Measure Not Created!'];
        }
        return response()->json($msg);
    }

}

