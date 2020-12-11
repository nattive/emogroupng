<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'BrandName',
    ];

    public function products()
    {
        return
        $this->hasMany(product::class);
    }
}
