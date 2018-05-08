<?php

if ($request->filled('min_price') && $request->max_price == null) {

                $results = Location::with(['house' => function ($query) {
                    $query->where('price', '>=', $this->min_price);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('max_price') && $request->min_price == null) {

                $results = Location::with(['house' => function ($query) {
                    $query->where('price', '<=', $this->max_price);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('type_id')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where('house_type_id', $this->type_id);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_area_range')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where('area', '>=', $this->min_area_range);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('max_area_range')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where('area', '<=', $this->max_area_range);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_price') && $request->filled('max_price') && $request->type_id == null && $request->min_area_range == null) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '>=', $this->min_price],
                        ['price', '<=', $this->max_price],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_price') && $request->filled('type_id')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['min_price', '>=', $this->min_price],
                        ['house_type_id', $this->type_id],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('max_price') && $request->filled('type_id')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['max_price', '<=', $this->max_price],
                        ['house_type_id', $this->type_id],
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
                        ['area', '>=', $this->max_area_range],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('max_price') && $request->filled('min_area_range')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '<=', $this->max_price],
                        ['area', '>=', $this->min_area_range],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_price') && $request->filled('max_price') && $request->filled('type_id')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['min_price', '>=', $this->min_price],
                        ['max_price', '<=', $this->max_price],
                        ['house_type_id', $this->type_id],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_price') && $request->filled('max_price') && $request->filled('min_area_range')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '>=', $this->min_price],
                        ['price', '<=', $this->max_price],
                        ['area', '>=', $this->min_area_range],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            } elseif ($request->filled('min_price') && $request->filled('max_price') && $request->filled('type_id') && $request->filled('min_area_range')) {

                $results = Location::with(['house' => function ($query) {
                    $query->where([
                        ['price', '>=', $this->min_price],
                        ['price', '<=', $this->max_price],
                        ['area', '>=', $this->min_area_range],
                        ['house_type_id', $this->type_id],
                    ]);
                }])->where('address', 'LIKE', '%'.$keyword.'%')->get();

            }


 ?>
