<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Farm;
use App\Models\User;
use App\Models\Account;
use App\Models\Dipping;
use App\Models\Product;
use App\Models\Community;
use App\Models\Deworming;
use App\Models\AnimalInfo;
use App\Models\VisitorInfo;
use App\Models\ProductStock;
use App\Models\SalesInvoice;
use Illuminate\Http\Request;
use App\Models\PurchaseInvoice;
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

