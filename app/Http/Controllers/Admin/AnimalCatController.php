<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnimalCat;
use Illuminate\Http\Request;

class AnimalCatController extends Controller
{
    public function index()
    {
        $animalCats = AnimalCat::with('subcat')->where('parent_id', 0)->get();
        return view('admin.animal_cat.index', compact('animalCats'));
    }

    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        return view('admin.animal_cat.create');
    }

    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        // $data = $this->validate($request, [
        //     'type' => 'required',
        //     'name' => 'required',
        // ]);

        $data = [
            'type' => $request->type,
            'name' => $request->name,
            'parent_id' => 0
        ];


        try{
            AnimalCat::create($data);
            toast('Animal Category Added','success');
            return redirect()->back();
        }catch(\Exception $ex){
            toast('Animal Category Add Failed','error');
            return redirect()->back();
        }
    }

    public function SubCatStore(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        // $data = $this->validate($request, [
        //     'type' => 'required',
        //     'name' => 'required',
        // ]);

        $data = [
            'type' => $request->type,
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ];


        try{
            AnimalCat::create($data);
            toast('Animal Category Added','success');
            return redirect()->back();
        }catch(\Exception $ex){
            toast('Animal Category Add Failed','error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->sendPermissionError('edit')) {
            return $error;
        }
        $animalCat = AnimalCat::find($id);
        return view('admin.animal_cat.edit', compact('animalCat'));
    }



    public function update(Request $request, $id)
    {
        if ($error = $this->sendPermissionError('edit')) {
            return $error;
        }
        $data = [
            'type' => $request->type,
            'name' => $request->name,
            'parent_id' => 0
        ];

        try{
            AnimalCat::find($id)->update($data);
            toast('Animal Category Updated','success');
            return redirect()->route('animal-cat.index');
        }catch(\Exception $ex){
            toast('Animal Category Update Failed','error');
            return redirect()->back();
        }
    }

    // Animal Sub Category _________________________________________
    public function subEdit($id)
    {
        if ($error = $this->sendPermissionError('edit')) {
            return $error;
        }
        $animalSubCat = AnimalCat::find($id);
        $goats = AnimalCat::where('type', 1)->where('parent_id','!=', 0)->get();
        $sheeps = AnimalCat::where('type', 2)->where('parent_id','!=', 0)->get();
        return view('admin.animal_cat.sub_edit', compact('animalSubCat','goats','sheeps'));
    }

    public function subUpdate(Request $request, $id)
    {
        if ($error = $this->sendPermissionError('edit')) {
            return $error;
        }
        $data = [
            'type' => $request->type,
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ];

        try{
            AnimalCat::find($id)->update($data);
            toast('Animal Category Updated','success');
            return redirect()->route('animal-cat.index');
        }catch(\Exception $ex){
            toast('Animal Category Update Failed','error');
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        AnimalCat::find($id)->delete();
        toast('Farm Successfully Deleted','success');
        return redirect()->back();
    }

    public function getAnimalCat(Request $request)
    {
        $type = $request->type;
        $animalCats = AnimalCat::where('type', $type)->where('parent_id', 0)->get();
        $cat = '';
        $cat .= '<option value="0">Select</option>';
        foreach($animalCats as $animalCat){
            $cat .= '<option value="'.$animalCat->id.'">'.$animalCat->name.'</option>';
        }
        return json_encode(['cat'=>$cat]);
    }
}
