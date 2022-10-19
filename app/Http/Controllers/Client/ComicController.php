<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Comic;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComicController extends ClientController
{
    private $_pathView = "client.pages.comic.";

    public function detail(Category $category, Comic $comic)
    {
        if ($comic->category->is($category)) {
            $comments = Comment::whereIn('chapter_id', $comic->chapters)->get();
            return view($this->_pathView . 'detail', [
                'comic' => $comic,
                'comments' => $comments
            ]);
        }
        return redirect(route('client.home'));
    }
}
