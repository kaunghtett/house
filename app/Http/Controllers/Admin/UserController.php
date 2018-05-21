<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Role;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function index()
    {
        return view('superadmin.users.user-all');
    }

    public function getData()
    {
        //
    }

    public function host()
    {
        return view('superadmin.users.host');
    }

    public function hostData()
    {


        return Datatables::of($users)->make(true);
    }

    public function vistor()
    {
        return view('superadmin.users.vistor');
    }

    public function visitorData()
    {
        //
    }

    public function create()
    {
        $roles = Role::all();
        return view('superadmin.users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->hasFile('image')) {
            $profile_image = $request->image;
            $image_name = str_slug(auth()->user()->name, '-');
            $extension = $profile_image->getClientOriginalExtension();
            $profile_image->storeAs('public/photos/profiles', $image_name . '.' . $extension);
            $user->profile()->create([
                'address' => $request->address,
                'phone_no' => $request->phone_no,
                'image_name' => $image_name,
                'extension' => $extension,
            ]);
        } else {
            $user->profile()->create([
                'address' => $request->address,
                'phone_no' => $request->phone_no,
            ]);
        }


    }
}
