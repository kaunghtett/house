<?php

namespace App\Http\Controllers;

use App\House;
use App\HouseFeature;
use App\HouseType;
use App\Location;
use App\Region;
use App\Http\Requests\HouseUpdateFormRequest;
use App\Http\Requests\HouseRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class HouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = HouseType::all();
        $regions = Region::all();

        $recent_houses = House::withAllInfo()->recentHouses()->get();
        $featured_house = House::withAllInfo()
                        ->where('featured_house', 1)->get();

        $apartment_id = HouseType::where('type_name', 'Apartments')
                                 ->pluck('id');
        $apartments = House::withAllInfo()
                    ->where('house_type_id', $apartment_id)->get();
        // dd($apartments);
        $path = asset('/storage/photos/');


        return view('homes.home.index', compact('types', 'regions', 'recent_houses', 'path', 'featured_house', 'apartments'));
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
    public function store(HouseRequest $request)
    {
        //house basic
        $features = implode(', ', $request->features);
        $house = House::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'house_type_id' => $request->house_type_id,
            'period' => $request->period,
            'price' => $request->price,
            'area' => $request->area,
            'rooms' => $request->rooms,
            'description' => $request->description,
            'features' => $features,
        ]);

        $house_id = $house->id;

        //house details
        $house->houseDetail()->create([
            'building_year' => $request->building_year,
            'bathrooms' => $request->bathrooms,
            'bedrooms' => $request->bedrooms,
            'parking' => $request->parking,
            'water' => $request->water,
            'exercise_room' => $request->exercise_room,
        ]);

        //featured image
        $feature_image = $request->feature_image;
        $feature_extension = $feature_image->getClientOriginalExtension();
        $feature_image_name = $house_id . '-feature-image';
        // store image in storage/public/photos
        $feature_image->storeAs('public/photos/',
                                $feature_image_name . '.'
                                . $feature_extension);

        $thumb_featured_img = Image::make($feature_image->getRealPath());
        $thumb_featured_img->resize(100,100)
                           ->save(storage_path('app/public/photos/thumbnails/'
                            . $feature_image_name . '.' . $feature_extension));

         // save to database (galleries)
        $house->galleries()->create([
            'image_name' => $feature_image_name,
            'extension' => $feature_extension,
            'is_featured' => true,
        ]);

        // other images
        $images = $request->images;
        foreach ($images as $index => $image) {
            $image_extension = $image->getClientOriginalExtension();
            $image_name = $house_id . '-house-image' . $index;
            $image->storeAs('public/photos',
                            $image_name . '.' . $image_extension);

            $thumb_img = Image::make($image->getRealPath());
            $thumb_img->resize(100,100)
                      ->save(storage_path('app/public/photos/thumbnails/'
                        . $image_name . '.' . $image_extension));

            $house->galleries()->create([
                'image_name' => $image_name,
                'extension' => $image_extension,
            ]);
        }

        //locations
        $house->location()->create([
            'address' => title_case($request->address),
            'street' => title_case($request->street),
            'township' => title_case($request->township),
            'region_id' => $request->region,
        ]);

        alert()->success('Successfully', 'A New House is created successfully.');

        return redirect()->route('houses.show', compact('house_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {
        $house = $house->load(['houseDetail', 'houseType', 'location']);

        $all_features = HouseFeature::all();
        $features = explode(', ', $house->features);

        $images = $house->galleries;
        $path = asset('/storage/photos/');

        // reviews
        $reviews = $house->reviews;

        // related houses
        $related_township = $house->location->township;
        $related_region_id = $house->location->region->id;
        $related_locations = Location::where('township', $related_township)
                            ->where('region_id', $related_region_id)
                            ->where('house_id', '!=', $house->id)
                            ->limit(3)
                            ->get();
                            // dd($related_locations);
        $collections = [];

        foreach ($related_locations as $related_location) {
            $related_house = House::relatedHouse($related_location)->get();
            array_push($collections, $related_house);
        }

        return view('homes.show', compact('house', 'images', 'path', 'all_features', 'features', 'reviews', 'collections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house)
    {
        // dd($house);
        $types = HouseType::all();
        $house_type_id = $house->HouseType->id;
        $houseDetail = $house->houseDetail;
        $location = $house->location;
        $regions = Region::all();
        $features = HouseFeature::all();
        $path = asset('/storage/photos/');
        $feature_images = Gallery::where('house_id', $house->id)->where('is_featured', 1)->get();
        $images = Gallery::where('house_id', $house->id)->where('is_featured', 0)->get();

        return view('homes.edit', compact('house', 'types', 'house_type_id', 'houseDetail', 'location', 'regions', 'features', 'feature_images', 'images', 'path'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(HouseUpdateFormRequest $request, House $house)
    {
        // dd($house->houseDetail->id);
        // dd($house->user->id);
        // dd($request->all());

        $features = implode(', ', $request->features);
        //house basic
        $house->update([
            'title' => $request->title,
            'house_type_id' => $request->house_type_id,
            'house_detail_id' => $house->houseDetail->id,
            'period' => $request->period,
            'price' => $request->price,
            'area' => $request->area,
            'rooms' => $request->rooms,
            'description' => $request->description,
            'features' => $features,
        ]);

        //house details
        $house->houseDetail()->update([
            'building_year' => $request->building_year,
            'bathrooms' => $request->bathrooms,
            'bedrooms' => $request->bedrooms,
            'parking' => $request->parking,
            'water' => $request->water,
            'exercise_room' => $request->exercise_room,
        ]);

        $house_id = $house->id;

        //featured image
        if ($request->has('feature_image')) {
            // get old feature image
            $old_feature_image = Gallery::where('house_id', $house_id)->where('is_featured', 1)->get();
            // delete old feature image
            foreach ($old_feature_image as $image) {
                $image_name = $image->image_name . '.' . $image->extension;
                $path = storage_path('app/public/photos/');
                $thumbnail_path = storage_path('app/public/photos/thumbnails/');
                if (File::exists($path . $image_name)) {

                    Storage::delete('/public/photos/' . $image_name);

                } elseif (File::exists($thumbnail_path . $image_name)) {

                    Storage::delete('/public/photos/thumbnails/' . $image_name);
                }
            }

            //featured image
            $feature_image = $request->feature_image;
            $feature_extension = $feature_image->getClientOriginalExtension();
            $feature_image_name = $house_id . '-feature-image';

            // store image in storage/public/photos/features/
            $feature_image->storeAs('public/photos/',
                                    $feature_image_name . '.'
                                    . $feature_extension);

            $thumb_featured_img = Image::make($feature_image->getRealPath());
            $thumb_featured_img->resize(100,100)
                               ->save(storage_path('app/public/photos/thumbnails/'
                                . $feature_image_name . '.' . $feature_extension));
        }

        // other images
        if ($request->has('images')) {
            // get old images
            $old_images = Gallery::where('house_id', $house_id)->where('is_featured', 0)->get();
            // delete old images
            foreach ($old_images as $image) {
                $image_name = $image->image_name . '.' . $image->extension;
                $path = storage_path('app/public/photos/');
                $thumbnail_path = storage_path('app/public/photos/thumbnails/');
                if (File::exists($path . $image_name)) {

                    Storage::delete('/public/photos/' . $image_name);

                } elseif (File::exists($thumbnail_path . $image_name)) {

                    Storage::delete('/public/photos/thumbnails/' . $image_name);
                }
            }

            $images = $request->images;
            foreach ($images as $index => $image) {
                $image_extension = $image->getClientOriginalExtension();
                $image_name = $house_id . '-house-image' . $index;
                $image->storeAs('public/photos',
                                $image_name . '.' . $image_extension);

                $thumb_img = Image::make($image->getRealPath());
                $thumb_img->resize(100,100)
                          ->save(storage_path('app/public/photos/thumbnails/'
                            . $image_name . '.' . $image_extension));
            }
        }

        //locations update
        $house->location()->update([
            'address' => $request->address,
            'street' => $request->street,
            'township' => $request->township,
            'region_id' => $request->region,
        ]);

        alert()->success('Updated Successfully', $house->title . ' is updated successfully.');

        return redirect()->route('houses.show', compact('house_id'));
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
