<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//sfor delete 
use Illuminate\Database\Eloquent\SoftDeletes;
//user 
use App\Models\User;
//country
use App\Models\Country;
//brand
use App\Models\Brands;
//sub_category
use App\Models\Color;
use App\Models\OrderItem;
use App\Models\SubCategory;
//image
use App\Models\Image;
//order
//tag 
use App\Models\Tag;
//order
use App\Models\Order;
//sieze
use App\Models\Size;
class Product extends Model
{
    use HasFactory;
    //sfor delete
    use SoftDeletes;
    //fillable 
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'regular_price',
        'sale_price',
        'SKU',
        'status',
        'quantity_total',
        'barecode',
        'made_in',
        'user_id',
        'brand_id',
        'sub_category_id',
        'img_id',
        'img2_id',
        'img3_id',
        'img4_id',
    ];
    //user
    public function user(){
        return $this->belongsTo(User::class);
    }
    //country
    public function country(){
        return $this->belongsTo(Country::class);
    }
    //brand
    public function brand(){
        return $this->belongsTo(Brands::class);
    }
    //sub_category
    public function sub_category(){
        return $this->belongsTo(SubCategory::class);
    }
    //image
    public function image(){
        return $this->hasMany(Image::class);
    }
    //size 
    public function sizes(){
        return $this->belongsToMany(Size::class,'product_sizes');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags');
    }
    //colors 

    //order
    public function orders(){
        return $this->belongsToMany(Order::class,'order_items');
    }

    //order item
    public function orderItems(){
        return $this->hasMany(OrderItem::class,'product_id');
    }

    //color
    public function colors(){
        return $this->hasMany(Color::class);
    }
}
