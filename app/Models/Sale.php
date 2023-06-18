<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//soft delete 
use Illuminate\Database\Eloquent\SoftDeletes;
//user 
use App\Models\User;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='sales';
    protected $fillable=['sale_date','status','user_id'];
}
