<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['house_id', 'address', 'street',
                            'township', 'region_id'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
