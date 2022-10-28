<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewStatistic extends Model
{
    protected $fillable = ['ip_address', 'chapter_id'];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }
}
