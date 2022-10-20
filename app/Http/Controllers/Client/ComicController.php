<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Comic;
use App\Models\Comment;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComicController extends ClientController
{
    private $_pathView = "client.pages.comic.";

    public function detail(Category $category, Comic $comic)
    {
        if ($comic->category->is($category)) {
            $comments = Comment::whereIn('chapter_id', $comic->chapters)->get();
            
            $favorite = false;
            if(Auth::check()) {
                $favorite = Favorite::where([
                    ['user_id', '=', Auth::user()->id],
                    ['comic_id', '=', $comic->id]
                ])->get()->first() == null ? false : true;
            }

            return view($this->_pathView . 'detail', [
                'comic' => $comic,
                'comments' => $comments,
                'favorite' => $favorite
            ]);
        }
        return redirect(route('client.home'));
    }
}
