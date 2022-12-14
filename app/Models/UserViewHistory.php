<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserViewHistory extends Model
{
    protected $fillable = ['user_id', 'chapter_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }
}
