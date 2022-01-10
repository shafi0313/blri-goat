<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Farm;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Community;
use App\Models\CommunityCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;

class CommunityCatController extends Controller
{
    public function index()
    {
        $communityCats = CommunityCat::all();
        return view('admin.community_cat.index', compact('communityCats'));
    }

    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $districts = District::orderBy('name')->get();
        return view('admin.community_cat.create', compact('districts'));
    }

    public function store(Request $request)
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'address' => 'required',
            'community_name' => 'required|max:100',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'password' => ['required', 'confirmed', Password::min(6)
                                                            ->letters()
                                                            // ->mixedCase()
                                                            ->numbers()
                                                            ->symbols()
                                                            ->uncompromised()],
        ]);


        DB::beginTransaction();
        $image_name = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = "user_".rand(0,1000).'.'.$image->getClientOriginalExtension();
            $request->image->move('files/images/user/',$image_name);
        }else{
            $image_name = "company_logo.jpg";
        }

        $user = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'type' => 2,
            'is' => 2,
            'address' => $request->input('address'),
            'profile_photo_path' => $image_name,
            'password' => bcrypt($request->input('password')),
        ];
        $user = User::create($user);

        $community = [
            'user_id' => $user->id,
            'name' => $request->community_name,
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'address' => $request->address,
        ];

        $permission = [
            'role_id' => 5,
            'model_type' => "App\Models\User",
            'model_id' =>  $user->id,
        ];
        DB::table('model_has_roles')->insert($permission);

        try{
            DB::commit();
            CommunityCat::create($community);
            toast('Success','success');
            return redirect()->route('community-cat.index');
        }catch(\Exception $ex){
            DB::rollBack();
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->sendPermissionError('edit')) {
            return $error;
        }
        $districts = District::orderBy('name')->get();
        $communityCat = CommunityCat::find($id);
        return view('admin.community_cat.edit', compact('communityCat','districts'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->sendPermissionError('edit')) {
            return $error;
        }
        $this->validate($request, [
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'address' => 'required',
            'community_name' => 'required|max:100',
            'district_id' => 'required',
            // 'upazila_id' => 'required',
            'password' => ['nullable', 'confirmed', Password::min(6)
                                                            ->letters()
                                                            // ->mixedCase()
                                                            ->numbers()
                                                            ->symbols()
                                                            ->uncompromised()],
        ]);

        // DB::beginTransaction();
        $user = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
        ];
        if(!empty($request->password)){
            $user['password'] = bcrypt($request->input('password'));
        }
        if(!empty($request->email_check)){
            $user['email'] = strtolower($request->input('email'));
        }
        $image_name = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = "user_".rand(0, 1000).'.'.$image->getClientOriginalExtension();
            $request->image->move('files/images/user/',$image_name);
            $user['profile_photo_path'] = $image_name;
        }
        User::whereId($request->user_id)->update($user);

        $community = [
            'name' => $request->community_name,
            'district_id' => $request->district_id,
            'address' => $request->address,
        ];

        if(!empty($request->upazila_id)){
            $community['upazila_id'] = $request->upazila_id;
        }

        try{
            CommunityCat::find($id)->update($community);
            toast('Updated','success');
            return redirect()->route('community-cat.index');
        }catch(\Exception $ex){
            toast('Update Failed','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        CommunityCat::find($id)->delete();
        toast('Successfully Deleted','success');
        return redirect()->back();
    }
}
