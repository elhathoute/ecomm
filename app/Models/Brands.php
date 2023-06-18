<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//user 
use App\Models\User;
use App\Models\Slider;
use App\Models\Product;
//soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class Brands extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'brands';
    protected $fillable = ['name','slug','description','image','status','user_id'];
    protected $dates = ['deleted_at'];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function slider(){
        return $this->hasMany(Slider::class,'brand_id','id');
    }
    
    public function product(){
        return $this->hasMany(Product::class,'brand_id','id');
    }


}
