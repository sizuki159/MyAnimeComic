<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Chapter extends Model
{
    protected $fillable = ['name', 'chapter_number', 'comic_id', 'source', 'status'];

    public function comic()
    {
        return $this->belongsTo('App\Model\Comic', 'comic_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($chapter) {
            Storage::disk('do_spaces')->deleteDirectory($chapter->comic_id . '/chapters/' . $chapter->chapter_number);
        });
    }
}
