<?php

namespace App\Http\Controllers\Admin;

use App\Models\Upazila;
use App\Models\District;
use App\Models\Community;
use App\Models\CommunityCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommunityCatController extends Controller
{
    public function index()
    {
        $communityCats = CommunityCat::all();
        return view('admin.community_cat.index', compact('communityCats'));
    }

    public function create()
    {
        $districts = District::all();
        return view('admin.community_cat.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:100',
            'address' => 'required',
        ]);

        try{
            CommunityCat::create($data);
            toast('Community Category Added','success');
            return redirect()->route('community-cat.index');
        }catch(\Exception $ex){
            toast('Community Category Add Failed','error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $farm = Farm::find($id);
        return view('admin.farm.edit', compact('farm'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:80',
            'contact_person' => 'required|max:100',
            'phone' => 'required|numeric',
            'nid' => 'required|numeric',
            'address' => 'required',
        ]);

        try{
            Farm::find($id)->update($data);
            toast('Farm Updated','success');
            return redirect()->route('farm.index');
        }catch(\Exception $ex){
            toast('Farm Update Failed','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Farm::find($id)->delete();
        toast('Farm Successfully Deleted','success');
        return redirect()->back();
    }
}
