<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'user_id', 'title', 'house_type_id', 'period', 'price', 'area',
        'rooms', 'description', 'features', 'is_featured'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function scopeWithAllInfo($query)
    {
        return $query->with(['houseDetail', 'location', 'user',
            'galleries' => function ($query) {
                $query->where('is_featured', 1);
            }]);
    }

    public static function recentHouses()
    {
        return static::withAllInfo()->latest()->limit(3)->get();
    }

    public static function featuredHouse()
    {
        return static::withAllInfo()->where('featured_house', 1)->first();
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

    public static function featuredHouses()
    {
        return static::with(['location', 'galleries' => function ($query) {
            $query->where('is_featured', 1);
        }])->where('featured_house', 1)->get();
    }
}
