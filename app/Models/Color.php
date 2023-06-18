<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//sfor delete
use Illuminate\Database\Eloquent\SoftDeletes;
//user
use App\Models\User;
//size 
use App\Models\Size;

class Color extends Model
{
    use HasFactory;
    //sfor delete
    use SoftDeletes;
    //fillable
    protected $fillable = [
        'name',
        'code',
        'user_id',
        'status',
    ];
    //user
    public function user(){
        return $this->belongsTo(User::class);
    }
    //size
    public function sizes(){
        return $this->belongsToMany(Size::class,'size_colors');
    }
}
