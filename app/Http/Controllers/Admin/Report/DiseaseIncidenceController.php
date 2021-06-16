<?php

namespace App\Http\Controllers\Admin\Report;

use App\Models\AnimalCat;
use Illuminate\Http\Request;
use App\Models\DiseaseTreatment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Disease;

class DiseaseIncidenceController extends Controller
{
    public function selectDate()
    {
        $animalCats = AnimalCat::where('parent_id',0)->get();
        $diseases = Disease::all();
        return view('admin.report.disease_incidence.select_date', compact('animalCats','diseases'));
    }

    public function report(Request $request)
    {
        $form_date = $request->get('form_date');
        $to_date = $request->get('to_date');
        $animal_cat_id = $request->get('animal_cat_id');
        $animal_sub_cat_id = $request->get('animal_sub_cat_id');
        if($animal_sub_cat_id==0){
            $animalCat = $animal_cat_id;
            $animalCatDb = 'animal_cat_id';
        }else{
            $animalCat = $animal_sub_cat_id;
            $animalCatDb = 'animal_cat_sub_id';
        }
        // return$diseaseTreatments = DiseaseTreatment::with(['animalInfo' => function($q,$animalCatDb,$animalCat){
        //     $q->where($animalCatDb, $animalCat);
        // }])->whereBetween('created_at', [$form_date,$to_date])->get();

        // $getSalesInvoice = DB::table('sales_invoices')
        //         ->join('products', 'sales_invoices.product_id', '=', 'products.id')
        //         ->orderBy('products.name')
        //         ->join('product_pack_sizes', 'sales_invoices.size', '=', 'product_pack_sizes.id')
        //         ->orderBy('product_pack_sizes.size')
        //         ->select('sales_invoices.*','products.id','products.name','product_pack_sizes.id','product_pack_sizes.size')
        //         ->whereBetween('invoice_date',[$form_date, $to_date])
        //         ->get()
        //         ->where('type', 1);

        // return$diseaseTreatments = DB::table('disease_treatments')
        //         ->join('animal_infos', 'disease_treatments.animal_info_id', '=', 'animal_infos.id')
        //         ->where($animalCatDb, $animalCat)
        //         ->select('disease_treatments.*','animal_infos.*')
        //         // ->whereBetween('disease_treatments.created_at', [$form_date,$to_date])
        //         ->get();

        if($request->disease_season){
            $disease_season = $request->disease_season;

        }else{
            $get_disease_season = 'Rainy,Winter,Summer';
            $disease_season = explode(',', $get_disease_season);
        }

        if($request->disease_id){
            $disease = $request->disease_id;

        }else{
            $disease = Disease::select('id')->get()->pluck('id');
        }

        $diseaseTreatments = DiseaseTreatment::with(['animalInfo' => function($q)use($animalCatDb,$animalCat) {
            $q->where($animalCatDb, $animalCat);
        }])->whereIn('disease_season', $disease_season)->whereIn('disease_id', $disease)->whereBetween('disease_date', [$form_date,$to_date])->get();
        return view('admin.report.disease_incidence.report', compact('diseaseTreatments','form_date','to_date'));
    }
}
