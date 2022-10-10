<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Comic extends Model
{
    protected $fillable = ['title', 'image', 'author', 'status', 'category_id'];

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
