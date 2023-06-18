<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//soft delete
use Illuminate\Database\Eloquent\SoftDeletes;
//model user 
use App\Models\User;
//model category
use App\Models\Category;
//model product
use App\Models\Product;

class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'sub_categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'status',
        'category_id',
        'user_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
