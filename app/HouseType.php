<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseType extends Model
{
    protected $fillable = ['type_name'];

    public function houses()
    {
        return $this->hasMany(House::class);
    }
}
