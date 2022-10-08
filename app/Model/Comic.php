<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = ['title', 'name', 'status'];

    public function chapters()
    {
        return $this->hasMany('App\Model\Chapter', 'comic_id');
    }
}
