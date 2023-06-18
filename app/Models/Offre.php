<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Subcategory;

class Offre extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'image',
        'sub_category_id',
        'percent',
    ];
    public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'sub_category_id');
    }
}
