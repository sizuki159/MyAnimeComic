<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends ClientController
{
    private $_pathView = "client.pages.category.";

    public function list()
    {
        return "show list category";
    }

    public function showListComic(Category $category)
    {
        return view($this->_pathView . 'listcomic', [
            'category' => $category
        ]);
    }
}

