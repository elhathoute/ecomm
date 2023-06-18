<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    //fillable 
    protected $table = 'coupons';
    protected $fillable = [
        'code',
        'type',
        'value',
        'cart_value',
    ];
}
