<?php

namespace App\Http\Controllers\Admin;

use App\Models\Farm;
use App\Models\Dipping;
use App\Models\Community;
use App\Models\Deworming;
use App\Models\AnimalInfo;
use App\Models\VisitorInfo;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $farms = Farm::count();
        $communities = Community::count();
        $animalInfo = AnimalInfo::count();
        $animalDade = AnimalInfo::whereRemark('Dead')->count();
        $dewormingDate = Deworming::select(['deworming_date'])->latest()->first();
        $dippingDate = Dipping::select(['dipping_date'])->latest()->first();
        return view('admin.dashboard', compact('farms','communities','animalInfo','animalDade','dewormingDate','dippingDate'));
    }

    public function VisitorInfo()
    {
        $visitors = VisitorInfo::all();
        return view('admin.visitor_info.index', compact('visitors'));
    }
}

