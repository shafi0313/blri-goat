<?php

namespace App\Http\Controllers\Admin\Report;

use Carbon\Carbon;
use App\Models\AnimalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BlriStockController extends Controller
{
    public function selectDate()
    {
        return view('admin.research_stock.select_date');
    }

    public function researchStock(Request $request)
    {


        $form_date = $request->get('form_date');
        $to_date = $request->get('to_date');
        $form_date_month = Carbon::parse($form_date)->format('m');

        $animals = AnimalInfo::whereBetween('d_o_b',[$form_date,$to_date])->whereStatus(0)->get();

        // প্রজননক্ষম পাঁঠা Start ________________________________________________________________________
        // $pBlackBengalPathaGets = $animals->where('animal_cat_id',1)->where('sex', 'M')->where('reproductive',1);
        // $pBlackBengalPatha = 0;
        // foreach($pBlackBengalPathaGets as $pBlackBengalPathaGet){
        //     $data = \Carbon\Carbon::parse($pBlackBengalPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 7){
        //         $pBlackBengalPatha++;
        //     };
        // }
        $pBlackBengalPatha = $animals->where('animal_cat_id',1)->where('sex', 'M')->where('reproductive',1)->whereIn('id',animalAdult($request->to_date))->count();

        // Jamuna piri
        // $pJamunapariPathaGets = $animals->where('animal_cat_id',7)->where('sex', 'M')->where('reproductive',1);
        // $pJamunapariPatha = 0;
        // foreach($pJamunapariPathaGets as $pJamunapariPathaGet){
        //     $data = \Carbon\Carbon::parse($pJamunapariPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 7){
        //         $pJamunapariPatha++;
        //     };
        // }
        $pJamunapariPatha = $animals->where('animal_cat_id',7)->where('sex', 'M')->where('reproductive',1)->whereIn('id',animalAdult($request->to_date))->count();

        // Boar
        // $pBoerPathaGets = $animals->where('animal_cat_id',8)->where('sex', 'M')->where('reproductive',1);
        // $pBoerPatha = 0;
        // foreach($pBoerPathaGets as $pBoerPathaGet){
        //     $data = \Carbon\Carbon::parse($pBoerPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 7){
        //         $pBoerPatha++;
        //     };
        // }
        $pBoerPatha = $animals->where('animal_cat_id',8)->where('sex', 'M')->where('reproductive',1)->whereIn('id',animalAdult($request->to_date))->count();

        // 	Jamunapari cross Black Bengal
        // $pJCBPathaGets = $animals->where('animal_cat_id',9)->where('sex', 'M')->where('reproductive',1);
        // $pJCBPatha = 0;
        // foreach($pJCBPathaGets as $pJCBPathaGet){
        //     $data = \Carbon\Carbon::parse($pJCBPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 7){
        //         $pJCBPatha++;
        //     };
        // }
        $pJCBPatha = $animals->where('animal_cat_id',9)->where('sex', 'M')->where('reproductive',1)->whereIn('id',animalAdult($request->to_date))->count();

        // Boer cross Jamunapari
        // $pBCJPathaGets = $animals->where('animal_cat_id',10)->where('sex', 'M')->where('reproductive',1);
        // $pBCJPatha = 0;
        // foreach($pBCJPathaGets as $pBCJPathaGet){
        //     $data = \Carbon\Carbon::parse($pBCJPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 7){
        //         $pBCJPatha++;
        //     };
        // }
        $pBCJPatha = $animals->where('animal_cat_id',10)->where('sex', 'M')->where('reproductive',1)->whereIn('id',animalAdult($request->to_date))->count();
        // প্রজননক্ষম পাঁঠা End ________________________________________________________________________


        // বাড়ন্ত পাঁঠা Start ___________________________________________________________________________________
        // $bBlackBengalPathaGets = $animals->where('animal_cat_id',1)->where('sex', 'M')->where('reproductive',1);
        // $bBlackBengalPatha = 0;
        // foreach($bBlackBengalPathaGets as $bBlackBengalPathaGet){
        //     $data = \Carbon\Carbon::parse($bBlackBengalPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 3 && $data < 8){
        //         $bBlackBengalPatha++;
        //     };
        // }
        $bBlackBengalPatha = $animals->where('animal_cat_id',1)->where('sex', 'M')->where('reproductive',1)->whereIn('id',animalGrowing($request->to_date))->count();

        // Jamuna piri
        // $bJamunapariPathaGets = $animals->where('animal_cat_id',7)->where('sex', 'M')->where('reproductive',1);
        // $bJamunapariPatha = 0;
        // foreach($bJamunapariPathaGets as $bJamunapariPathaGet){
        //     $data = \Carbon\Carbon::parse($bJamunapariPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 3 && $data < 8){
        //         $bJamunapariPatha++;
        //     };
        // }
        $bJamunapariPatha = $animals->where('animal_cat_id',7)->where('sex', 'M')->where('reproductive',1)->whereIn('id',animalGrowing($request->to_date))->count();

        // Boar
        // $bBoerPathaGets = $animals->where('animal_cat_id',8)->where('sex', 'M')->where('reproductive',1);
        // $bBoerPatha = 0;
        // foreach($bBoerPathaGets as $bBoerPathaGet){
        //     $data = \Carbon\Carbon::parse($bBoerPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 3 && $data < 8){
        //         $bBoerPatha++;
        //     };
        // }
        $bBoerPatha = $animals->where('animal_cat_id',8)->where('sex', 'M')->where('reproductive',1)->whereIn('id',animalGrowing($request->to_date))->count();

        // 	Jamunapari cross Black Bengal
        // $bJCBPathaGets = $animals->where('animal_cat_id',9)->where('sex', 'M')->where('reproductive',1);
        // $bJCBPatha = 0;
        // foreach($bJCBPathaGets as $bJCBPathaGet){
        //     $data = \Carbon\Carbon::parse($bJCBPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 3 && $data < 8){
        //         $bJCBPatha++;
        //     };
        // }
        $bJCBPatha = $animals->where('animal_cat_id',9)->where('sex', 'M')->where('reproductive',1)->whereIn('id',animalGrowing($request->to_date))->count();

        // Boer cross Jamunapari
        // $bBCJPathaGets = $animals->where('animal_cat_id',10)->where('sex', 'M')->where('reproductive',1);
        // $bBCJPatha = 0;
        // foreach($bBCJPathaGets as $bBCJPathaGet){
        //     $data = \Carbon\Carbon::parse($bBCJPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 3 && $data < 8){
        //         $bBCJPatha++;
        //     };
        // }
        $bBCJPatha = $animals->where('animal_cat_id',10)->where('sex', 'M')->where('reproductive',1)->whereIn('id',animalGrowing($request->to_date))->count();
        // বাড়ন্ত পাঁঠা End ___________________________________________________________________________________



        // Baby Start ________________________________________________________________________________________
        // $babyBlackBengalPathaGets = $animals->where('animal_cat_id',1)->where('sex', 'M')->where('reproductive',1);
        // $babyBlackBengalPatha = 0;
        // foreach($babyBlackBengalPathaGets as $babyBlackBengalPathaGet){
        //     $data = \Carbon\Carbon::parse($babyBlackBengalPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data < 4){
        //         $babyBlackBengalPatha++;
        //     };
        // }
        $babyBlackBengalPatha = $animals->where('animal_cat_id',1)->where('sex', 'M')->whereIn('id',animalKid($request->to_date))->count();

        // Jamuna piri
        // $babyJamunapariPathaGets = $animals->where('animal_cat_id',7)->where('sex', 'M')->where('reproductive',1);
        // $babyJamunapariPatha = 0;
        // foreach($babyJamunapariPathaGets as $babyJamunapariPathaGet){
        //     $data = \Carbon\Carbon::parse($babyJamunapariPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data < 4){
        //         $babyJamunapariPatha++;
        //     };
        // }
        $babyJamunapariPatha = $animals->where('animal_cat_id',7)->where('sex', 'M')->whereIn('id',animalKid($request->to_date))->count();

        // Boar
        // $babyBoerPathaGets = $animals->where('animal_cat_id',8)->where('sex', 'M')->where('reproductive',1);
        // $babyBoerPatha = 0;
        // foreach($babyBoerPathaGets as $babyBoerPathaGet){
        //     $data = \Carbon\Carbon::parse($babyBoerPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data < 4){
        //         $babyBoerPatha++;
        //     };
        // }
        $babyBoerPatha = $animals->where('animal_cat_id',8)->where('sex', 'M')->whereIn('id',animalKid($request->to_date))->count();

        // 	Jamunapari cross Black Bengal
        // $babyJCBPathaGets = $animals->where('animal_cat_id',9)->where('sex', 'M')->where('reproductive',1);
        // $babyJCBPatha = 0;
        // foreach($babyJCBPathaGets as $babyJCBPathaGet){
        //     $data = \Carbon\Carbon::parse($babyJCBPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data < 4){
        //         $babyJCBPatha++;
        //     };
        // }
        $babyJCBPatha = $animals->where('animal_cat_id',9)->where('sex', 'M')->whereIn('id',animalKid($request->to_date))->count();

        // Boer cross Jamunapari
        // $babyBCJPathaGets = $animals->where('animal_cat_id',10)->where('sex', 'M')->where('reproductive',1);
        // $babyBCJPatha = 0;
        // foreach($babyBCJPathaGets as $babyBCJPathaGet){
        //     $data = \Carbon\Carbon::parse($babyBCJPathaGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data < 4){
        //         $babyBCJPatha++;
        //     };
        // }
        $babyBCJPatha = $animals->where('animal_cat_id',10)->where('sex', 'M')->whereIn('id',animalKid($request->to_date))->count();
        // Baby End ________________________________________________________________________________________

        // ছাগী
        // Adult Start __________________________________________________________________________________
        // $pBlackBengalGasiGets = $animals->where('animal_cat_id',1)->where('sex', 'F');
        // $pBlackBengalGasi = 0;
        // foreach($pBlackBengalGasiGets as $pBlackBengalGasiGet){
        //     $data = \Carbon\Carbon::parse($pBlackBengalGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 7){
        //         $pBlackBengalGasi++;
        //     };
        // }
        $pBlackBengalGasi = $animals->where('animal_cat_id',1)->where('sex', 'F')->whereIn('id',animalAdult($request->to_date))->count();

        // $pJamunapariGasiGets = $animals->where('animal_cat_id', 7)->where('sex', 'F');
        // $pJamunapariGasi = 0;
        // foreach($pJamunapariGasiGets as $pJamunapariGasiGet){
        //     $data = \Carbon\Carbon::parse($pJamunapariGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 7){
        //         $pJamunapariGasi++;
        //     };
        // }

        // return $pJamunapariGasi;
        $pJamunapariGasi = $animals->where('animal_cat_id', 7)->where('sex', 'F')->whereIn('id',animalAdult($request->to_date))->count();

        // $pBoerGasiGets = $animals->where('animal_cat_id', 8)->where('sex', 'F');
        // $pBoerGasi = 0;
        // foreach($pBoerGasiGets as $pBoerGasiGet){
        //     $data = \Carbon\Carbon::parse($pBoerGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 7){
        //         $pBoerGasi++;
        //     };
        // }
        $pBoerGasi = $animals->where('animal_cat_id', 8)->where('sex', 'F')->whereIn('id',animalAdult($request->to_date))->count();

        // 	Jamunapari cross Black Bengal
        // $pJCBGasiGets = $animals->where('animal_cat_id',9)->where('sex', 'F');
        // $pJCBGasi = 0;
        // foreach($pJCBGasiGets as $pJCBGasiGet){
        //     $data = \Carbon\Carbon::parse($pJCBGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 7){
        //         $pJCBGasi++;
        //     };
        // }
        $pJCBGasi = $animals->where('animal_cat_id',9)->where('sex', 'F')->whereIn('id',animalAdult($request->to_date))->count();

        // Boer cross Jamunapari
        // $pBCJGasiGets = $animals->where('animal_cat_id',10)->where('sex', 'F');
        // $pBCJGasi = 0;
        // foreach($pBCJGasiGets as $pBCJGasiGet){
        //     $data = \Carbon\Carbon::parse($pBCJGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 7){
        //         $pBCJGasi++;
        //     };
        // }
        $pBCJGasi  = $animals->where('animal_cat_id',10)->where('sex', 'F')->whereIn('id',animalAdult($request->to_date))->count();;
        // Adult End __________________________________________________________________________________



        // বাড়ন্ত ছাগী Start ____________________________________________________________________________________
        // $bBlackBengalGasiGets = $animals->where('animal_cat_id',1)->where('sex', 'F');
        // $bBlackBengalGasi = 0;
        // foreach($bBlackBengalGasiGets as $bBlackBengalGasiGet){
        //     $data = \Carbon\Carbon::parse($bBlackBengalGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 3 && $data < 8){
        //         $bBlackBengalGasi++;
        //     };
        // }
        $bBlackBengalGasi = $animals->where('animal_cat_id',1)->where('sex', 'F')->whereIn('id',animalGrowing($request->to_date))->count();

        // $bJamunapariGasiGets = $animals->where('animal_cat_id', 7)->where('sex', 'F');
        // $bJamunapariGasi = 0;
        // foreach($bJamunapariGasiGets as $bJamunapariGasiGet){
        //     $data = \Carbon\Carbon::parse($bJamunapariGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 3 && $data < 8){
        //         $bJamunapariGasi++;
        //     };
        // }
        $bJamunapariGasi = $animals->where('animal_cat_id', 7)->where('sex', 'F')->whereIn('id',animalGrowing($request->to_date))->count();

        // $bBoerGasiGets = $animals->where('animal_cat_id', 8)->where('sex', 'F');
        // $bBoerGasi = 0;
        // foreach($bBoerGasiGets as $bBoerGasiGet){
        //     $data = \Carbon\Carbon::parse($bBoerGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 3 && $data < 8){
        //         $bBoerGasi++;
        //     };
        // }
        $bBoerGasi = $animals->where('animal_cat_id', 8)->where('sex', 'F')->whereIn('id',animalGrowing($request->to_date))->count();

        // 	Jamunapari cross Black Bengal
        // $bJCBGasiGets = $animals->where('animal_cat_id',9)->where('sex', 'F');
        // $bJCBGasi = 0;
        // foreach($bJCBGasiGets as $bJCBGasiGet){
        //     $data = \Carbon\Carbon::parse($bJCBGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 3 && $data < 8){
        //         $bJCBGasi++;
        //     };
        // }
        $bJCBGasi = $animals->where('animal_cat_id',9)->where('sex', 'F')->whereIn('id',animalGrowing($request->to_date))->count();

        // Boer cross Jamunapari
        // $bBCJGasiGets = $animals->where('animal_cat_id',10)->where('sex', 'F');
        // $bBCJGasi = 0;
        // foreach($bBCJGasiGets as $bBCJGasiGet){
        //     $data = \Carbon\Carbon::parse($bBCJGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data > 3 && $data < 8){
        //         $bBCJGasi++;
        //     };
        // }
        $bBCJGasi = $animals->where('animal_cat_id',10)->where('sex', 'F')->whereIn('id',animalGrowing($request->to_date))->count();
        // বাড়ন্ত ছাগী End ____________________________________________________________________________________

        // Baby ছাগী Start ____________________________________________________________________________________
        // $babyBlackBengalGasiGets = $animals->where('animal_cat_id',1)->where('sex', 'F');
        // $babyBlackBengalGasi = 0;
        // foreach($babyBlackBengalGasiGets as $babyBlackBengalGasiGet){
        //     $data = \Carbon\Carbon::parse($babyBlackBengalGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data < 4){
        //         $babyBlackBengalGasi++;
        //     };
        // }
        $babyBlackBengalGasi = $animals->where('animal_cat_id',1)->where('sex', 'F')->whereIn('id',animalKid($request->to_date))->count();

        // $babyJamunapariGasiGets = $animals->where('animal_cat_id', 7)->where('sex', 'F');
        // $babyJamunapariGasi = 0;
        // foreach($babyJamunapariGasiGets as $babyJamunapariGasiGet){
        //     $data = \Carbon\Carbon::parse($babyJamunapariGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data < 4){
        //         $babyJamunapariGasi++;
        //     };
        // }
        $babyJamunapariGasi = $animals->where('animal_cat_id', 7)->where('sex', 'F')->whereIn('id',animalKid($request->to_date))->count();

        // $babyBoerGasiGets = $animals->where('animal_cat_id', 8)->where('sex', 'F');
        // $babyBoerGasi = 0;
        // foreach($babyBoerGasiGets as $babyBoerGasiGet){
        //     $data = \Carbon\Carbon::parse($babyBoerGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data < 4){
        //         $babyBoerGasi++;
        //     };
        // }
        $babyBoerGasi = $animals->where('animal_cat_id', 8)->where('sex', 'F')->whereIn('id',animalKid($request->to_date))->count();

        // 	Jamunapari cross Black Bengal
        // $babyJCBGasiGets = $animals->where('animal_cat_id',9)->where('sex', 'F');
        // $babyJCBGasi = 0;
        // foreach($babyJCBGasiGets as $babyJCBGasiGet){
        //     $data = \Carbon\Carbon::parse($babyJCBGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data < 4){
        //         $babyJCBGasi++;
        //     };
        // }
        $babyJCBGasi = $animals->where('animal_cat_id',9)->where('sex', 'F')->whereIn('id',animalKid($request->to_date))->count();

        // Boer cross Jamunapari
        // $babyBCJGasiGets = $animals->where('animal_cat_id',10)->where('sex', 'F');
        // $babyBCJGasi = 0;
        // foreach($babyBCJGasiGets as $babyBCJGasiGet){
        //     $data = \Carbon\Carbon::parse($babyBCJGasiGet->d_o_b)->diff(\Carbon\Carbon::now())->format('%y%m');
        //     if($data < 4){
        //         $babyBCJGasi++;
        //     };
        // }
        $babyBCJGasi = $animals->where('animal_cat_id',10)->where('sex', 'F')->whereIn('id',animalKid($request->to_date))->count();
        // Baby ছাগী End ____________________________________________________________________________________


        // পূর্বের স্টক ____________________________________________________________
        $preAnimalStocks = AnimalInfo::where('d_o_b', '<', $form_date)->get();


        $bornThisMonth = AnimalInfo::whereMonth('d_o_b', $form_date_month)->get();

        $deathThisMonth = AnimalInfo::whereMonth('death_date', $form_date_month)->get();


        return view('admin.research_stock.report', compact(
            [
                'form_date','to_date','animals',
                'pBlackBengalPatha','pJamunapariPatha','pBoerPatha','pJCBPatha','pBCJPatha',
                'bBlackBengalPatha','bJamunapariPatha','bBoerPatha','bJCBPatha','bBCJPatha',
                'babyBlackBengalPatha','babyJamunapariPatha','babyBoerPatha','babyJCBPatha','babyBCJPatha',

                'pBlackBengalGasi','pJamunapariGasi','pBoerGasi','pJCBGasi','pBCJGasi',
                'bBlackBengalGasi','bJamunapariGasi','bBoerGasi','bJCBGasi','bBCJGasi',
                'babyBlackBengalGasi','babyJamunapariGasi','babyBoerGasi', 'babyJCBGasi','babyBCJGasi',
                'preAnimalStocks',
                'bornThisMonth',
                'deathThisMonth'
            ]
        ));
    }
}
