<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $fillable = [
        'paymentMode',
        'customer_id',
        'amount',
        'confirmPayment',
        'transactionRef',
        'status',
    ];

    // public function custo
}
