<?php

namespace App\Http\Controllers\Client;

use App\Models\Comic;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends ClientController
{
    public function toggle(Comic $comic)
    {
        $favorite = Favorite::where([
            ['user_id', '=', Auth::user()->id],
            ['comic_id', '=', $comic->id],
        ])->get()->first();

        if(!$favorite) {
            Favorite::create([
                'user_id' => Auth::user()->id,
                'comic_id' => $comic->id
            ]);
        } else {
            $favorite->delete();
        }
        return redirect()->back();
    }
}
