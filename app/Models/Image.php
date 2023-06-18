<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//sfor delete
use Illuminate\Database\Eloquent\SoftDeletes;
//product
use App\Models\Product;

class Image extends Model
{
    use HasFactory;
    //sfor delete
    use SoftDeletes;
    //fillable
    protected $fillable = [
        'img',
        'status',
    ];
    //protected 
    
    //product
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
