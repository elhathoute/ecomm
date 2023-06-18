<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    //soft delete
    use SoftDeletes;
    protected $table = 'contacts';
    protected $fillable = ['name','email','subject','message','status','reply'];

}
