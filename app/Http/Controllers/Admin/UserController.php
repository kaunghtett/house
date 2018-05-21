<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $role = Role::where('slug', 'host')->first();
        $users = $role->users;

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
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
