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
            
            // Get list comments on this comic
            $comments = DB::table('users')
            ->select([
                'users.name',
                'comments.content',
                'comments.created_at'
            ])
            ->join('comments', 'comments.user_id', '=', 'users.id')
            ->where('comments.status', '=', 'active')
            ->where('comments.comic_id', '=', $comic->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

            // User favorites 
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
