<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ResearchStockController extends Controller
{
    public function selectDate()
    {
        return view('admin.research_stock.select_date');
    }

    public function researchStock(Request $request)
    {

        $form_date = $request->get('form_date');
        $to_date = $request->get('to_date');

        $getChallan = AnimalInfo::whereBetween('created_at',[$form_date,$to_date])->where('sex','M')->where('type',1)->count();
        // $supplierChallans = $getChallan->groupBy('invoice_no');
        return view('admin.research_stock.report', compact('form_date','to_date'));
    }
}
