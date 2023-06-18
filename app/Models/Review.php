<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//user 
use App\Models\User;
//order item
use App\Models\OrderItem;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='reviews';
    protected $fillable=[
        'rating',
        'comment',
        'order_item_id',
        'user_id'
    ];
    //user
    public function user(){
        return $this->belongsTo(User::class);
    }
    //order item
    public function orderItem(){
        return $this->belongsTo(OrderItem::class);
    }

    
}
