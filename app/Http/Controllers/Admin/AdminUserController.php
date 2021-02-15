<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function index()
    {
        $adminUsers = User::where('type', 1)->get();
        return view('admin.user_management.admin.index', compact('adminUsers'));
    }

    public function create()
    {
        return view('admin.user_management.admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'is' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $image_name = '';
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $image_name = "user_".rand(0,1000).'.'.$image->getClientOriginalExtension();
            $request->image->move('images/users/',$image_name);
        }else{
            $image_name = "company_logo.png";
        }

        $data = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'type' => 1,
            'is' => $request->input('is'),
            'address' => $request->input('address'),
            'profile_photo_path' => $image_name,
            'password' => bcrypt($request->input('password')),
        ];

        DB::beginTransaction();

        try {
            $user = User::create($data);
            $permission = [
                'role_id' => $request->input('is'),
                'model_type' => "App\Models\User",
                'model_id' =>  $user->id,
            ];
            DB::table('model_has_roles')->insert($permission);
            DB::commit();
            toast('User Successfully Inserted','success');
            return redirect()->route('admin-user.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            toast($ex->getMessage().'User Inserted Faild','error');
            return back();
        }
    }

    public function edit($id)
    {
        $adminUsers = User::find($id);
        return view('admin.user_management.admin.edit', compact('adminUsers'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $image_name = '';
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $image_name = "user_".rand(0,1000).'.'.$image->getClientOriginalExtension();
            $request->image->move('images/users/',$image_name);
        }else{
            $image_name = $request->oldImage;
        }

        $data = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'profile_photo_path' => $image_name,
            'password' => bcrypt($request->input('password')),
        ];

        $permission = [
            'role_id' => $request->input('is_')
        ];

        DB::beginTransaction();

        try {
            User::find($id)->update($data);
            DB::table('model_has_roles')->where('model_id', $id)->update($permission);
            DB::commit();
            toast('User Successfully Updated','success');
            return redirect()->route('admin-user.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            toast($ex->getMessage().'User Updated Faild','error');
            return back();
        }
    }

    public function destroy($id)
    {
        //
    }
}
