<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnimalInfo;
use App\Models\ProductionRecord;
use Illuminate\Http\Request;

class ProductionRecordController extends Controller
{
    public function index()
    {
        $productionRecords = ProductionRecord::all();
        return view('admin.production_record.index', compact('productionRecords'));
    }

    public function createId($id)
    {
        // return$animalInfo->id;
        $productionRecord = ProductionRecord::where('id',$id)->first();
        return view('admin.production_record.create', compact('productionRecord'));
    }
}
