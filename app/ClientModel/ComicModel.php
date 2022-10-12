<?php

namespace App\ClientModel;

use App\Model\Comic;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ComicModel extends Comic
{
    protected $table = 'comics';

    // Overide lại nếu cần sử dụng Binding Route Model
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getTotalViewAttribute()
    {
        $chapters = $this->chapters;
        $totalView = 0;
        foreach ($chapters as $chapter) {
            $totalView += $chapter->total_view;
        }
        return $totalView;
    }
}
