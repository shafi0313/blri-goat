<?php

namespace App\Http\Controllers\Admin\Report;

use App\Models\AnimalCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnimalInfo;

class BirthController extends Controller
{
    public function selectDate()
    {
        $animalCats = AnimalCat::where('parent_id',0)->get();
        return view('admin.report.birth.select_date', compact('animalCats'));
    }

    public function report(Request $request)
    {
        $form_date = $request->get('form_date');
        $to_date = $request->get('to_date');
        $animal_cat_id = $request->get('animal_cat_id');
        $animal_sub_cat_id = $request->get('animal_sub_cat_id');

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

        if(!$animal_cat_id){
            $animalCatDb = 'animal_cat_id';
            $animalCat = AnimalCat::select('id')->get()->pluck('id');
        }
        else if($animal_sub_cat_id==0){
            $getAnimalCat = $animal_cat_id;
            $animalCat = explode(',', $getAnimalCat);
            $animalCatDb = 'animal_cat_id';
        }else{
            $getAnimalCat = $animal_sub_cat_id;
            $animalCat = explode(',', $getAnimalCat);
            $animalCatDb = 'animal_cat_sub_id';
        }

        if($request->season_o_birth){
            $get_season_o_birth = $request->season_o_birth;
            $season_o_birth = explode(',', $get_season_o_birth);

        }else{
            $get_season_o_birth = 'Rainy,Winter,Summer';
            $season_o_birth = explode(',', $get_season_o_birth);
        }

        $diseaseTreatments = AnimalInfo::whereIn($animalCatDb, $animalCat)
                ->whereIn('season_o_birth', $season_o_birth)
                ->whereIn('id', d_o_b($to_date))
                ->whereBetween('d_o_b', [$form_date,$to_date])
                ->get();

        $animals = AnimalInfo::whereIn('id', d_o_b($to_date))
                ->whereIn($animalCatDb, $animalCat)
                ->whereBetween('d_o_b', [$form_date,$to_date])
                ->get();

        return view('admin.report.birth.report', compact('diseaseTreatments','form_date','to_date','animals'));
    }
}
