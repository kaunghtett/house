<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['house_id', 'guest_name', 'guest_email',
                            'guest_phone', 'guest_message'];
}
