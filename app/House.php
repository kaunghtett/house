<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'user_id', 'title', 'house_type_id', 'period', 'price', 'area',
        'rooms', 'description', 'features', 'featured_house', 'is_approved'
    ];
        // automatic eager loading
    protected $with = ['houseDetail', 'location', 'user', 'houseType',
                        'galleries'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // one to one relationship
    public function houseDetail()
    {
        return $this->hasOne(HouseDetail::class);
    }

    public function houseType()
    {
        return $this->belongsTo(HouseType::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }
    // one to many relationship
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    /**
     * @param Query Builder instance, filters instance
     *
     * @return filter result
     */
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    public function scopeRelatedHouse($query, $related_location)
    {
        return $query->join('house_details', 'houses.id',
                         '=', 'house_details.house_id')
                    ->join('house_types', 'houses.house_type_id', '=', 'house_types.id')
                    ->join('locations', 'houses.id', '=', 'locations.house_id')
                    ->join('galleries', 'houses.id', '=', 'galleries.house_id')
                    ->where('houses.id', $related_location->house->id)
                    ->where('is_featured', 1);
    }

    public function scopeNewHouses($query)
    {
        return $query->where('is_approved', 1)->latest()->limit(3);
    }

    public static function scopeFeaturedHouse($query)
    {
        return $query->where('is_approved', 1)->where('featured_house', 1);
    }

    public static function scopeApartments($query, $apartment_id)
    {
        return $query->where('is_approved', 1)->where('house_type_id', $apartment_id);
    }

    public static function scopeFavouriteHouses($query, $favHouseIds)
    {
        return $query->whereIn('id', $favHouseIds);
    }

    public function featuredImage()
    {
        return $this->galleries->where('is_featured', 1)->first();
    }

    public function showFeaturedImage($path)
    {
        return  $path . '/' . $this->featuredImage()->image_name . '.' . $this->featuredImage()->extension;
    }

    public function showImages($image, $thumbnails)
    {
        return $thumbnails . '/' . $image->image_name . '.' . $image->extension;
    }
}
