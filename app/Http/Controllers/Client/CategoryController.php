<?php

namespace App\Http\Controllers\Client;

use App\ClientModel\CategoryModel;
use App\ClientModel\ComicModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends ClientController
{
    private $_pathView = "client.pages.category.";

    public function showListComic(CategoryModel $category)
    {
        $listComic = $category->comics;
        return view($this->_pathView . 'listcomic', [
            'listComic' => $listComic
        ]);
    }
}
