<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//slider model
//soft delete
//brands
//subcategories
use App\Models\Brands;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Slider extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='sliders';
    protected $fillable = [
        'title',
        'description',
        'image',
        'colors',
        'subcategory_id',
        'brand_id',
    ];

    public function subcategory(){
        //has many 
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }
    public function brand(){
        return $this->belongsTo(Brands::class,'brand_id');
    }
}
