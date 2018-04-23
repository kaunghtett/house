<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = ['user_id', 'title', 'house_type_id',
                            'period', 'price', 'area', 'room',
                            'description', 'features'];
}
