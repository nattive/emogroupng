<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'categoryName',
    ];

    public function products()
    {
        return
        $this->hasMany(product::class);
    }
}
