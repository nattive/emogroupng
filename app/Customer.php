<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'Appartment',
        'confirmPayment',
        'country',
        'deliveryCharge',
        'emailaddress',
        'firstname',
        'lastname',
        'phone',
        'postcodezip',
        'streetaddress',
        'towncity',
    ];
}
