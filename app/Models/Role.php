<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN  = 1;
    const CLIENT = 2;

    protected $fillable = ['name'];
    
}
