<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ModelHasRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    public function index()
    {
        if (Auth::user()->is !=1) {
            Alert::info('You have no permission');
            return back();
        }
        $adminUsers = User::whereIn('is', [1,2])->get();
        return view('admin.user_management.admin.index', compact('adminUsers'));
    }

    public function create()
    {
        if ($error = $this->sendPermissionError('create')) {
            return $error;
        }
        if (Auth::user()->is!=1) {
            Alert::info('You have no permission');
            return back();
        }
        return view('admin.user_management.admin.create');
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
            'is' => 'required',
            'address' => 'required',
            'password' => ['required', 'confirmed', Password::min(6)
                                                            ->letters()
                                                            // ->mixedCase()
                                                            ->numbers()
                                                            ->symbols()
                                                            ->uncompromised()],
        ]);
        DB::beginTransaction();

        $image_name = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = "user_".rand(0, 1000).'.'.$image->getClientOriginalExtension();
            $request->image->move('files/images/user/', $image_name);
        } else {
            $image_name = "company_logo.jpg";
        }

        $data = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'type' => 1,
            'is' => 1,
            'address' => $request->input('address'),
            'profile_photo_path' => $image_name,
            'password' => bcrypt($request->input('password')),
        ];
        $user = User::create($data);

        if (Auth::user()->is ==1) {
            $permission = [
                'role_id' => $request->input('is'),
                'model_type' => "App\Models\User",
                'model_id' =>  $user->id,
            ];
            DB::table('model_has_roles')->insert($permission);
        }

        try {
            DB::commit();
            toast('User Successfully Inserted', 'success');
            return redirect()->route('admin-user.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            toast($ex->getMessage().'User Inserted Failed', 'error');
            return back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->sendPermissionError('edit')) {
            return $error;
        }
        $adminUsers = User::findOrFail($id);
        return view('admin.user_management.admin.edit', compact('adminUsers'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->sendPermissionError('edit')) {
            return $error;
        }
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'password' => ['nullable', 'confirmed', Password::min(6)
                                                            ->letters()
                                                            // ->mixedCase()
                                                            ->numbers()
                                                            ->symbols()
                                                            ->uncompromised()],
        ]);

        DB::beginTransaction();

        $image_name = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = "user_".rand(0, 10000).'.'.$image->getClientOriginalExtension();
            $request->image->move('files/images/user/', $image_name);
        } else {
            $image_name = $request->oldImage;
        }


        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'profile_photo_path' => $image_name,
        ];

        if (!empty($request->password)) {
            $data['password'] = bcrypt($request->input('password'));
        }
        if(!empty($request->email_check)){
            $user['email'] = strtolower($request->input('email'));
        }

        if (Auth::user()->is == 1) {
            ModelHasRole::whereModel_id($id)->update(['role_id' => $request->input('is')]);
        }

        try {
            User::find($id)->update($data);
            DB::commit();
            toast('User Successfully Updated', 'success');
            return redirect()->route('admin-user.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            toast($ex->getMessage().'User Updated Failed', 'error');
            return back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->sendPermissionError('delete')) {
            return $error;
        }
        User::find($id)->delete();
        toast('Success', 'success');
        return redirect()->back();
    }
}
