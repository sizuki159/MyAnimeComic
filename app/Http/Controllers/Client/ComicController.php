<?php

namespace App\Http\Controllers\Client;

use App\Model\Category;
use App\Model\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComicController extends ClientController
{
    private $_pathView = "client.pages.comic.";

    public function detail(Category $category, Comic $comic)
    {
        if ($comic->category->is($category)) {
            return view($this->_pathView . 'detail', [
                'comic' => $comic
            ]);
        }
        return redirect(route('client.home'));
    }
}
