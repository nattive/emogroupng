<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'name',
        'type',
        'code',
        'amount_off',
        'discount_off',
    ];

    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    public function discount($total)
    {
        if ($this->type == 'FIXED') {
            return $this->value;
        } elseif ($this->type == 'PERCENTAGE') {
            return round(($this->percentage_off / 100) * $total);
        } else {
            return 0;
        }
    }
}
