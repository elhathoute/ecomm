<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//sfor delete
use Illuminate\Database\Eloquent\SoftDeletes;
//user
use App\Models\User;
//prodyct 
//color 
use App\Models\Color;
use App\Models\Product;

class Size extends Model
{
    use HasFactory;
    //sfor delete
    use SoftDeletes;
    //fillable
    protected $fillable = [
        'name',
        'user_id',
        'status',
    ];
    //user
    public function user(){
        return $this->belongsTo(User::class);
    }
    //product
    public function products(){
        return $this->belongsToMany(Product::class,'product_sizes');
    }
    public function colors(){
        return $this->belongsToMany(Color::class,'size_colors')
        ->withPivot('quantity','product_id')
        ;
    }
}
