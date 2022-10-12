<?php

namespace App\ClientModel;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CategoryModel extends ClientModel
{
    protected $table = 'categories';

    // Overide lại nếu cần sử dụng Binding Route Model
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
