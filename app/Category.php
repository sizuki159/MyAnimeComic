<?php

namespace App;

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
}
