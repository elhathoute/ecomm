<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//category
use App\Models\Category;
//subcategory 
use App\Models\SubCategory;

//brands
use App\Models\Brands;
use App\Models\Profiles;
use App\Models\Order;
use App\Models\OrderItem;


class User extends Model
{
    use HasFactory;
    //fullable 
    protected $fillable=[
        'username','email','password','img','email_verified'];
    //hidden
    protected $hidden=['password'];
    
    //one to many relationship with brands
    public function brands(){
        return $this->hasMany(Brands::class,'user_id','id');
    }
    //one to many relationship with category
    public function category(){
        return $this->hasMany(Category::class,'user_id','id');
    }
    //one to many relationship with subcategory
    public function subcategory(){
        return $this->hasMany(SubCategory::class,'user_id','id');
    }


    //user belongs to hopital only admin  but user 

    public function profile(){
        return $this->hasOne(Profiles::class,'user_id','id');
    }

    //user has many orders
    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function orderItems(){
        return $this->hasManyThrough(OrderItem::class,Order::class);
    }

}
