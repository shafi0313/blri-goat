<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiseaseHealthController extends Controller
{
    public function index()
    {
        return view('admin.disease_health.index');
    }
}
