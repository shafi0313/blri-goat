<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $about = About::where('id', 1)->first();
        // $cvs = Cv::all();
        // $services = Service::all();
        // $testmonials = Testmonial::all();
        return view('frontend.index', compact('sliders','about'));
    }

    public function cv($id)
    {
        $cv = Cv::find($id);
        return view('frontend.cv', compact('cv'));
    }

    public function about()
    {
        $about = About::where('id', 1)->first();
        return view('frontend.about', compact('about'));
    }

    public function service($id)
    {
        $service = Service::where('id', 1)->first();
        return view('frontend.service', compact('service'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
