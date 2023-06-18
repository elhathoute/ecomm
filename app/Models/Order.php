<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//soft delete
use Illuminate\Database\Eloquent\SoftDeletes;
//user 
use App\Models\User;
//shipping
use App\Models\Shipping;
//transaction
//country 
use App\Models\Country;
//city
use App\Models\City;
//product
use App\Models\Product;
use App\Models\Transaction;
//order item
use App\Models\OrderItem;


class Order extends Model
{
    use HasFactory;
    //soft delete
    use SoftDeletes;
    protected $table='orders';
    protected $fillable = [
        'user_id',
        'subtotal',
        'discount',
        'tax',
        'total',
        'firstname',
        'lastname',
        'email',
        'phone',
        'line1',
        'line2',
        'city_id',
        'province',
        'country_id',
        'zipcode',
        'status',
        'is_shipping_different',
    ];

    //user
    public function user(){
        return $this->belongsTo(User::class);
    }
    //

    public function shipping(){
        return $this->hasOne(Shipping::class);
    }

    public function transaction(){
        return $this->hasOne(Transaction::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
    //product 
    public function products(){
        //with pivot
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    //country
    public function country(){
        return $this->belongsTo(Country::class);
    }

    //city
    public function city(){
        return $this->belongsTo(City::class);
    }




}
