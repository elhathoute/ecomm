<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//soft delete
use Illuminate\Database\Eloquent\SoftDeletes;
//user
use App\Models\User;
//country 
use App\Models\Country;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cities';
    protected $fillable = ['name','slug','country_id','status','user_id'];
    protected $dates = ['deleted_at'];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
