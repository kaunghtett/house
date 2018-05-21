<?php

namespace App\Http\Controllers\Admin;

use App\ContactMessage;
use App\House;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AdminController extends Controller
{
    public function index()
    {
        if (empty(auth()->user()->profile)) {
            return redirect()->route('profiles.create');
        }

        $numOfHouses = House::all()->count();
        $numOfUsers = User::all()->count();

        $host = Role::where('slug', 'host')->first();
        $numOfHosts = $host->users->count();

        $guest = Role::where('slug', 'guest')->first();
        $numOfVistor = $guest->users->count();

        return view('superadmin.dashboard', compact('numOfHouses', 'numOfUsers', 'numOfHosts', 'numOfVistor'));
    }

    public function getData()
    {
        $messages = ContactMessage::all();
        return Datatables::of($messages)
            ->addColumn('confirm', function($message) {
                return '<form action="' . route('messages.confirm', $message->user_id) . '" method="POST" onsubmit="return approve()">' . csrf_field() . ' <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-check"></i> Confirm</button></form>';
            })
            ->addColumn('remove', function($message) {
                return '<form action="' . route('messages.delete', $message->id) . '" method="POST" onsubmit="return remove()">' . csrf_field() . method_field("DELETE") . ' <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> Remove</button></form>';
            })
            ->rawColumns(['confirm','remove'])
            ->make(true);
    }
}
