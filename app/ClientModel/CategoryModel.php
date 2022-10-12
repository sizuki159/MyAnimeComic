<?php

namespace App\ClientModel;

use App\Model\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CategoryModel extends Category
{
    protected $table = 'categories';

    // Overide lại nếu cần sử dụng Binding Route Model
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
