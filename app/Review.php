<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['body', 'house_id'];

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
