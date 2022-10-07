<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'status'];

    // Overide boot , ví dụ trước khi create thì làm gì
    protected static function boot()
    {
        parent::boot();
        // static::creating(function ($category){
        //     dd($category);
        // });
    }

    // Overide lại nếu cần sử dụng Binding Route Model
    public function getRouteKeyName()
    {
        return parent::getRouteKeyName();
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
