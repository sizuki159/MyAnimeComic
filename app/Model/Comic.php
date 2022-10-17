<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Comic extends Model
{
    protected $fillable = ['title', 'image', 'author', 'description', 'status', 'category_id'];

    #region Attributes
    public function getTotalViewAttribute()
    {
        return $this->chapters->sum('total_view');
    }

    public function getTotalChapterAttribute()
    {
        return $this->chapters->count();
    }

    public function getTotalCommentAttribute()
    {
        $totalComment = 0;
        $this->chapters->each(function ($chapter) use ($totalComment) {
            $totalComment += $chapter->totalComment;
        });
        return $totalComment;
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

    // Overide lại nếu cần sử dụng Binding Route Model
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($comic) {
            $comic->slug = Str::slug($comic->title);
        });

        static::deleting(function ($comic) {
            Storage::disk('do_spaces')->deleteDirectory($comic->id);
        });
    }

    #region Relationship
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'comic_id');
    }
    #endregion
}
