<?php

namespace App\Http\Controllers\Admin;

use App\Models\Farm;
use App\Models\User;
use App\Models\Account;
use App\Models\Product;
use App\Models\Community;
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
        return view('admin.dashboard', compact('farms','communities','animalInfo','animalDade'));
    }

    public function VisitorInfo()
    {
        $visitors = VisitorInfo::all();
        return view('admin.visitor_info.index', compact('visitors'));
    }
}

