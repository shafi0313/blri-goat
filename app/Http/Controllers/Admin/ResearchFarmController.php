<?php

namespace App\Http\Controllers\Admin;

use App\Models\Farm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResearchFarmController extends Controller
{
    public function index()
    {
        $farms = Farm::all();
        return view('admin.research_farm.index', compact('farms'));
    }

    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        return view('admin.research_farm.create');
    }

    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $data = $this->validate($request, [
            'name' => 'required|max:80',
            'contact_person' => 'required|max:100',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        try{
            Farm::create($data);
            toast('Farm Added','success');
            return redirect()->route('farm.index');
        }catch(\Exception $ex){
            toast('Farm Added Failed','error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->sendPermissionError('edit')) {
            return $error;
        }
        $farm = Farm::find($id);
        return view('admin.research_farm.edit', compact('farm'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $data = $this->validate($request, [
            'name' => 'required|max:80',
            'contact_person' => 'required|max:100',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        try{
            Farm::find($id)->update($data);
            toast('Farm Updated','success');
            return redirect()->route('farm.index');
        }catch(\Exception $ex){
            // return $ex->getMessage();
            toast('Farm Update Failed','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        Farm::find($id)->delete();
        toast('Farm Successfully Deleted','success');
        return redirect()->back();
    }
}
