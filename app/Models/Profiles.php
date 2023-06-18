<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Profiles extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable=[
        'street',
        'city',
        'state',
        'country',
        'address',
        'address2',
        'province',
        'twitter',
        'facebook',
        'linkedin',
        'instagram',
        'zip',
        'phone',
        'fname',
        'lname',
        'user_id',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
