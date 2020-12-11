<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    protected $fillable = [
        'name',
        'subject',
        'email',
        'message',
    ];
}
