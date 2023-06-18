<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//sfor delete
use Illuminate\Database\Eloquent\SoftDeletes;
//prodd
use App\Models\Product;
class Tag extends Model
{
    use HasFactory;
    //sfor delete
    use SoftDeletes;
    //fillable
    protected $fillable = [
        'name',
        'status',
    ];
    //product
    public function products(){
        return $this->belongsToMany(Product::class,'product_tags');
    }
}
