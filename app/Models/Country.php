<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//user 
use App\Models\User;
class Country extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'countries';
    protected $fillable = ['name','slug','image','status','user_id'];
    protected $dates = ['deleted_at'];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
