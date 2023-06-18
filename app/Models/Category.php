<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\SubCategory;
//city
use App\Models\City;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'image',
        'user_id',

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function subCategories(){
        return $this->hasMany(SubCategory::class); 
    }
    public function cities(){
        return $this->hasMany(City::class);
    }
}
