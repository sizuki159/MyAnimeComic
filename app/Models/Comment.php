<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'comic_id', 'content', 'status'];

    public function comic()
    {
        return $this->belongsTo(Comic::class, 'comic_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
