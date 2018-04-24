<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\House;
use App\HouseDetail;
use App\HouseFeature;
use App\HouseType;
use App\Location;
use App\Region;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = HouseType::all();
        $regions = Region::all();
        $features = HouseFeature::all();

        return view('homes.create', compact('types', 'regions', 'features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $features = implode(', ', $request->features);
        //house basic
        $house = House::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'house_type_id' => $request->house_type_id,
            'period' => $request->period,
            'price' => $request->price,
            'area' => $request->area,
            'room' => $request->rooms,
            'description' => $request->description,
            'features' => $features,
        ]);

        $house_id = $house->id;

        //featured image
        $feature_image = $request->feature_image;
        $feature_extension = $feature_image->getClientOriginalExtension();
        $feature_image_name = $house_id . '-feature-image' . '.' .
                                $feature_extension;

        $thumb_featured_img = Image::make($feature_image->getRealPath());
        $thumb_featured_img->resize(100,100)->save(storage_path('app/public/photos/thumbnails/' . $feature_image_name));

        // store image in storage/public/photos/features/
        $feature_image->storeAs('public/photos/features/',
                                $feature_image_name);
         // save to database (galleries)
        Gallery::create([
            'house_id' => $house_id,
            'image_name' => $feature_image_name,
            'extension' => $feature_extension,
            'is_featured' => true,
        ]);

        // other images
        $images = $request->images;
        foreach ($images as $index => $image) {
            $image_extension = $image->getClientOriginalExtension();
            $image_name = $house_id . '-house-image' . $index . '.' .
                            $image_extension;

            $thumb_img = Image::make($image->getRealPath());
            $thumb_img->resize(100,100)->save(storage_path('app/public/photos/thumbnails/' . $image_name));
            $image->storeAs('public/photos', $image_name);

            Gallery::create([
                'house_id' => $house_id,
                'image_name' => $image_name,
                'extension' => $image_extension,
            ]);
        }

        //house details
        HouseDetail::create([
            'house_id' => $house_id,
            'building_year' => $request->building_year,
            'bathrooms' => $request->bathrooms,
            'bedrooms' => $request->bedrooms,
            'parking' => $request->parking,
            'water' => $request->water,
            'exercise_room' => $request->exercise_room,
        ]);

        //locations
        Location::create([
            'house_id' => $house_id,
            'address' => $request->address,
            'street' => $request->street,
            'township' => $request->township,
            'region_id' => $request->region,
        ]);

        alert()->success('Successfully', 'A New House is created successfully.');

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {
        $location = Location::where('house_id', $house->id)->first();
        return view('homes.show', compact('house', 'location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        //
    }
}
