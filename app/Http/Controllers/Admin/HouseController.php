<?php

namespace App\Http\Controllers\Admin;

use App\House;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class HouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('superadmin.houses.house-all');
    }

    public function getData()
    {
        $houses = House::all();

        return Datatables::of($houses)
            ->addColumn('edit', function($house) {
                return '<a href="' . route('admin-houses.edit', $house->id) . '" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->addColumn('delete', function($house) {
                return '<form action="' . route('admin-houses.delete', $house->id) . '" method="POST" onsubmit="return remove()">' . csrf_field() . method_field("DELETE") . ' <button class="btn btn-sm btn-danger" type="submit"><i class="glyphicon glyphicon-remove"></i> Delete</button></form>';
            })
            ->addColumn('detail', function($house) {
                return '<a href="' . route('admin-houses.show', $house->id) . '" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-option-horizontal"></i></a>';
            })
            ->rawColumns(['edit','delete','detail'])
            ->make(true);
    }

    public function unpublish()
    {
        return view('superadmin.houses.house-unpublish');
    }

    public function unpublishData()
    {
        $houses = House::where('is_approved', 0)->get();

        return Datatables::of($houses)
            ->addColumn('edit', function($house) {
                return '<a href="' . route('admin-houses.edit', $house->id) . '" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->addColumn('delete', function($house) {
                return '<form action="' . route('admin-houses.delete', $house->id) . '" method="POST" onsubmit="return remove()">' . csrf_field() . method_field("DELETE") . ' <button class="btn btn-sm btn-danger" type="submit"><i class="glyphicon glyphicon-remove"></i> Delete</button></form>';
            })
            ->addColumn('detail', function($house) {
                return '<a href="' . route('admin-houses.show', $house->id) . '" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-option-horizontal"></i></a>';
            })
            ->addColumn('publish', function($house) {
                return '<a href="' . route('houses.approve', $house->id) . '" class="btn btn-sm btn-primary">Publish</a>';
            })
            ->rawColumns(['edit','delete','detail', 'publish'])
            ->make(true);
    }

    public function publish()
    {
        return view('superadmin.houses.house-publish');
    }

    public function publishData()
    {
        $houses = House::where('is_approved', 1)->get();

        return Datatables::of($houses)
            ->addColumn('edit', function($house) {
                return '<a href="' . route('admin-houses.edit', $house->id) . '" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->addColumn('delete', function($house) {
                return '<form action="' . route('admin-houses.delete', $house->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . ' <button class="btn btn-sm btn-danger" type="submit"><i class="glyphicon glyphicon-remove"></i> Delete</button></form>';
            })
            ->addColumn('detail', function($house) {
                return '<a href="' . route('admin-houses.show', $house->id) . '" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-option-horizontal"></i></a>';
            })
            ->addColumn('unpublish', function($house) {
                return '<a href="' . route('houses.block', $house->id) . '" class="btn btn-sm btn-warning">Unpublish</a>';
            })
            ->rawColumns(['edit','delete','detail', 'unpublish'])
            ->make(true);
    }

    public function approve(House $house)
    {
        $house->is_approved = true;
        $house->save();
        return back();
    }

    public function block(House $house)
    {
        $house->is_approved = false;
        $house->save();
        return back();
    }

    public function show(House $house)
    {
        $features = explode(', ', $house->features);
        return view('superadmin.houses.show', compact('house', 'features'));
    }

    public function edit(House $house)
    {
        dd($house);
    }

    public function update(Request $request, House $house)
    {
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

        return redirect()->route('admin-houses.show', compact('house_id'));
    }

    public function destroy(House $house)
    {
        dd($house);
    }
}
