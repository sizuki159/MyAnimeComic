<?php

namespace App\Http\Controllers\Client;

use App\Model\Category;
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
        $comics = $category->comics;
        return view($this->_pathView . 'listcomic', [
            'comics' => $comics
        ]);
    }
}

