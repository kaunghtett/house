<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public $min_price;
    public $max_price;
    public function search(Request $request)
    {
        $request->validate(['address' => 'required']);
        $this->min_price = $request->min_price;
        $this->max_price = $request->max_price;
        // dd($min_price);
        $keyword = $request->address;
        if ($keyword != '') {

            if ($this->max_price != null) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '>=', $this->min_price],
                        ['price', '<=', $this->max_price],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } else {

                $results = Location::with(['house' => function ($query) {
                    $query->where('price', '>=', $this->min_price);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            }


            if ($results->count() == 0) {
                alert()->info("No Results");
                return back();
            }
        }

        return view('homes.results', compact('results'));
    }
}
