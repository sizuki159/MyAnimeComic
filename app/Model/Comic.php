<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Comic extends Model
{
    protected $fillable = ['title', 'image', 'author', 'description', 'status', 'category_id'];

    public static function boot()
    {
        parent::boot();
        static::creating(function($comic){
            $comic->slug = Str::slug($comic->title);
        });
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }

    public function chapters()
    {
        return $this->hasMany('App\Model\Chapter', 'comic_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
}
