<?php

namespace App\Http\Controllers;

use App\House;
use App\Review;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(ReviewRequest $request, House $house)
    {
        Review::create([
            'body' => $request->body,
            'house_id' => $house->id,
        ]);

        return back();
    }
}
