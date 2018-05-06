<?php

namespace App\Http\Controllers;

use App\Favourite;
use App\House;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FavouriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($id)
    {
        if (Favourite::where('favourite_house_id', $id)->where('user_id', auth()->id())->count() < 1) {
            Favourite::create([
                'user_id' => auth()->id(),
                'favourite_house_id' => $id,
            ]);
        }

        $favHouseIds = Favourite::where('user_id', auth()->id())->pluck('favourite_house_id');

        $fav_houses = House::withAllInfo()->whereIn('id', $favHouseIds)->get();
        // dd($fav_houses);
        return view('homes.favourites', compact('fav_houses'));
    }

    public function show($id)
    {
        $favHouseIds = Favourite::where('user_id', $id)->pluck('favourite_house_id');

        $fav_houses = House::withAllInfo()->whereIn('id', $favHouseIds)->get();
        return view('homes.favourites', compact('fav_houses'));
    }

    public function delete($id)
    {
        // dd($id);
        Favourite::where('favourite_house_id', $id)->delete();

        return redirect()->route('favourite.show', ['id' => auth()->id()]);
    }
}
