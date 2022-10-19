<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Chapter extends Model
{
    protected $fillable = ['name', 'chapter_number', 'comic_id', 'source', 'status'];

    public static function boot()
    {
        parent::boot();
        static::deleting(function($chapter) {
            Storage::disk('do_spaces')->deleteDirectory($chapter->comic_id . '/chapters/' . $chapter->chapter_number);
        });
    }
    
    #region Relationship
    public function comic()
    {
        return $this->belongsTo(Comic::class, 'comic_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'chapter_id');
    }
    #endregion

    #region Attributes

    public function getListCommentsAttribute()
    {
        return $this->comments;
    }

    public function getTotalCommentAttribute()
    {
        return $this->comments->count();
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
    #endregion
}
