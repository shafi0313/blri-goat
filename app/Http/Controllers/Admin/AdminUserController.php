<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
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
        if (Auth::user()->is!=1) {
            Alert::info('You have no permission');
            return back();
        }
        return view('admin.user_management.admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            // 'is' => 'required',
            'address' => 'required',
            'password' => ['required', 'confirmed', Password::min(6)
                                                            ->letters()
                                                            // ->mixedCase()
                                                            ->numbers()
                                                            ->symbols()
                                                            ->uncompromised()],
        ]);

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

        DB::beginTransaction();

        try {
            User::create($data);
            DB::commit();
            toast('User Successfully Inserted', 'success');
            return redirect()->route('admin-user.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            toast($ex->getMessage().'User Inserted Faild', 'error');
            return back();
        }
    }

    public function edit($id)
    {
        $adminUsers = User::findOrFail($id);
        return view('admin.user_management.admin.edit', compact('adminUsers'));
    }

    public function update(Request $request, $id)
    {
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

        $image_name = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = "user_".rand(0, 10000).'.'.$image->getClientOriginalExtension();
            $request->image->move('files/images/user/', $image_name);
        } else {
            $image_name = $request->oldImage;
        }

        DB::beginTransaction();

        $data = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'profile_photo_path' => $image_name,
        ];

        if (!empty($request->password)) {
            $data['password'] = bcrypt($request->input('password'));
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
        User::find($id)->delete();
        toast('Success', 'success');
        return redirect()->back();
    }
}
