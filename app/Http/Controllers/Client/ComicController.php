<?php

namespace App\Http\Controllers\Client;

use App\ClientModel\CategoryModel;
use App\ClientModel\ComicModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComicController extends ClientController
{
    private $_pathView = "client.pages.comic.";

    public function detail(CategoryModel $category, ComicModel $comic)
    {
        if ($comic->category->is($category)) {
            return view($this->_pathView . 'detail', [
                'comic' => $comic
            ]);
        }
        return redirect(route('client.home'));
    }
}
