<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'chapter_id', 'comment', 'status'];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
