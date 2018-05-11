<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'address', 'phone_no', 'is_host'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
