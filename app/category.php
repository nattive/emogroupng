<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'category',
        'categoryToSub'
    ];

    public function blogs()
    {
        $this->hasMany(blog::class);
    }
}
