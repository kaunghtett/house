<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // dd(title_case($request->address));
        $keyword = title_case($request->address);
        if ($keyword != '') {
            $results = Location::where('address', 'LIKE', '%'.$keyword.'%')->get();
        }
        dd($results->load('house'));
        foreach ($results as $result) {
            dd($result->house);
        }
        dd('no data');
        $results = Location::where('address', 'LIKE', '%'.$keyword.'%')->get();
        dd($results);
    }
}
