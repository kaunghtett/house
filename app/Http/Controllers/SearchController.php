<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public $min_price;
    public $max_price;
    public $type_id;
    public $min_area_range;

    public function search(Request $request)
    {
        $request->validate(['address' => 'required']);
        $this->min_price = $request->min_price;
        $this->max_price = $request->max_price;
        $this->type_id = $request->type_id;
        $this->min_area_range = $request->min_area_range;

        $keyword = $request->address;
        if ($keyword != null) {
            if ($request->filled('min_price') && $request->filled('max_price') && $request->filled('type_id') && $request->filled('min_area_range') && $request->filled('max_area_range')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '>=', $this->min_price],
                        ['price', '<=', $this->max_price],
                        ['house_type_id', $this->type_id],
                        ['area', '>=', $this->min_area_range],
                        ['area', '<=', $this->max_area_range],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_price') && $request->filled('max_price') && $request->filled('type_id') && $request->filled('min_area_range')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '>=', $this->min_price],
                        ['price', '<=', $this->max_price],
                        ['house_type_id', $this->type_id],
                        ['area', '>=', $this->min_area_range],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_price') && $request->filled('max_price') && $request->filled('type_id')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '>=', $this->min_price],
                        ['price', '<=', $this->max_price],
                        ['house_type_id', $this->type_id],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_price') && $request->filled('max_price')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '>=', $this->min_price],
                        ['price', '<=', $this->max_price],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_price') && $request->filled('min_area_range')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '>=', $this->min_price],
                        ['area', '>=', $this->min_area_range],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_price') && $request->filled('max_area_range')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '>=', $this->min_price],
                        ['area', '<=', $this->max_area_range],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('max_price') && $request->filled('min_area_range')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '<=', $this->max_price],
                        ['area', '>=', $this->min_area_range],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('max_price') && $request->filled('max_area_range')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '<=', $this->max_price],
                        ['area', '<=', $this->max_area_range],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_price') && $request->filled('type_id')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '>=', $this->min_price],
                        ['house_type_id', $this->type_id],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('max_price') && $request->filled('type_id')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '<=', $this->max_price],
                        ['house_type_id', $this->type_id],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_area_range') && $request->filled('max_area_range')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['area', '>=', $this->min_area_range],
                        ['area', '<=', $this->max_area_range],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_area_range') && $request->filled('type_id')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['area', '>=', $this->min_area_range],
                        ['house_type_id', '<=', $this->type_id],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('max_area_range') && $request->filled('type_id')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['area', '<=', $this->max_area_range],
                        ['house_type_id', '<=', $this->type_id],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_price')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '>=', $this->min_price],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('max_price')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '<=', $this->max_price],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('type_id')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['house_type_id', $this->type_id],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_area_range')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['area', '>=', $this->min_area_range],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('max_area_range')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['area', '>=', $this->max_area_range],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } else {

                $results = Location::with('house')->where('address', 'LIKE', '%'.$keyword.'%')->get();

            }

            $numOfHouses = 0;
            foreach ($results as $result) {
                if ($result->house != null) {
                    $numOfHouses++;
                }
            }

            if ($results->count() == 0 || $numOfHouses == 0) {
                alert()->warning("No Result Found", "Try again");
                return back();
            }
        }
        // $s = ($numOfHouses == 1) ? ' Result' : ' Results';
        alert()->success(($numOfHouses == 1) ? "$numOfHouses Result Found" : "$numOfHouses Results Found");
        return view('homes.results', compact('results', 'numOfHouses'));
    }
}
