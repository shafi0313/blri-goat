<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalInfo;
use App\Models\PostMortem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostMortemController extends Controller
{
    public function index()
    {
        if (Auth::user()->is==1) {
            $postMortems = PostMortem::all();
        } else {
            $postMortems = PostMortem::whereUser_id(Auth::user()->id)->get();
        }
        return view('admin.post_mortem.index', compact('postMortems'));
    }


    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $animalInfos = getAnimalInfo();
        return view('admin.post_mortem.create', compact('animalInfos'));
    }


    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $data = $this->validate($request, [
            'animal_info_id'        => 'required',
            'date'                  => 'required|date',
            'death_time'            => 'required|max:20',
            'species'               => 'required',
            'death_time'            => 'required|max:20',
            'necropsy_time'         => 'required',
            'clinical_history'      => 'required',
            'gross_lesions'         => 'required',
            'microscopic_lesions'   => 'required',
            'tentative'             => 'required',
        ]);
        $data['user_id'] = Auth::user()->id;

        try {
            PostMortem::create($data);
            AnimalInfo::whereId($request->animal_info_id)->first()->update(['status' => 1]);
            toast('Success', 'success');
            return redirect()->route('post-mortem.index');
        } catch (\Exception $ex) {
            return $ex->getMessage();
            toast('Failed', 'error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        PostMortem::find($id)->delete();
        toast('Success', 'success');
        return redirect()->back();
    }
}
