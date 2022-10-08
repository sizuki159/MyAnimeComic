<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['name', 'comic_id', 'source', 'status'];

    public function comic()
    {
        return $this->belongsTo('App\Model\Comic', 'comic_id');
    }
}
