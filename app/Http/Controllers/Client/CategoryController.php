<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use App\Models\Comic;
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
        $comicOfCategory = $category->comics()->paginate(9);
        return view($this->_pathView . 'listcomic', [
            'category' => $category,
            'comicOfCategory' => $comicOfCategory
        ]);
    }
}

