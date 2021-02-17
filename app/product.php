<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'stock',
        'category',
        'description',
        'image',
        'genderSpec',
        'brand',
        'old_amount',
        'carton'
    ];

    public function ProductCategory()
    {
        return
        $this->hasOne(ProductCategory::class);
    }

    public function brand()
    {
        return
        $this->belongsTo(product::class);
    }
}
