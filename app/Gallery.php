<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['house_id', 'image_name',
                            'extension', 'is_featured'];
}
