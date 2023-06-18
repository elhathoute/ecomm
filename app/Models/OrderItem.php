<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//order 
use App\Models\Order;
//product
use App\Models\Review;
use App\Models\Product;
class OrderItem extends Model
{
    use HasFactory;
    protected $table='order_items';
    //$fillable 
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
        'color_id',
        'size_id'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function review(){
        return $this->hasOne(Review::class,'order_item_id');
    }
}
