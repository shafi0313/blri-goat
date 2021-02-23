<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceRecordController extends Controller
{
    public function index()
    {
        return view('admin.service_record.index');
    }

    public function create()
    {
        return view('admin.service_record.create');
    }
}
