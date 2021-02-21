<?php

namespace App\Http\Controllers\Admin;

use App\Models\Farm;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommunityCat;

class CommunityController extends Controller
{
    public function index()
    {
        $communitys = Community::all();
        return view('admin.community.index', compact('communitys'));
    }

    public function create()
    {

        $communityCats = CommunityCat::select(['id','name'])->get();
        return view('admin.community.create', compact('communityCats'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'community_cat_id' => 'required',
            'name' => 'required|max:80',
            'contact_person' => 'required|max:100',
            'phone' => 'required|numeric',
            'nid' => 'required|numeric',
            'address' => 'required',
        ]);
        // Community::create($data);

        try{
            Community::create($data);
            toast('Success','success');
            return redirect()->route('community.index');
        }catch(\Exception $ex){
            toast('Failed','error');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $community = Community::find($id);
        $farmSelect = Farm::where('id', $id)->first();
        $farms = Farm::select(['id','name'])->get();
        return view('admin.community.edit', compact('community','farmSelect','farms'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'community_cat_id' => 'required',
            'name' => 'required|max:80',
            'contact_person' => 'required|max:100',
            'phone' => 'required|numeric',
            'nid' => 'required|numeric',
            'address' => 'required',
        ]);

        try{
            Community::find($id)->update($data);
            toast('Community Updated','success');
            return redirect()->route('community .index');
        }catch(\Exception $ex){
            toast('Community Update Failed','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Community::find($id)->delete();
        toast('Community Successfully Deleted','success');
        return redirect()->back();
    }
}
