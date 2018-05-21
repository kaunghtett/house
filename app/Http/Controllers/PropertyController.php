<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function grid()
    {
        $sort = request('sort');

        $houses = $this->orderBy($sort);

        return view('homes.property.property-grid', compact('houses'));
    }

    public function list()
    {
        $sort = request('sort');

        $houses = $this->orderBy($sort);

        return view('homes.property.property-list', compact('houses'));
    }


    public function orderBy($sort)
    {
        return House::where('is_approved', 1)->orderBy('price', $sort)->paginate(6);
    }
}
