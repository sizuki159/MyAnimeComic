<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['name', 'status'];

    public function comics()
    {
        return $this->hasMany('App\Model\Comic', 'category_id');
    }

    // Overide boot , ví dụ trước khi create thì làm gì
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($category){
            $category->slug = Str::slug($category->name);
        });
    }

    // Overide lại nếu cần sử dụng Binding Route Model
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    // Client
    public function scopeStatusActive($query)
    {
        return $query->where('status', '=', 'active');
    }

}
