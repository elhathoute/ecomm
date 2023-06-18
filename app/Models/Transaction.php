<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//order 
use App\Models\Order;
class Transaction extends Model
{
    use HasFactory;
    protected $table='transactions';
    //$fillable
    protected $fillable = [
        'order_id',
        'user_id',
        'mode',
        'status',
    ];


    public function order(){
        return $this->belongsTo(Order::class);
    }

}
