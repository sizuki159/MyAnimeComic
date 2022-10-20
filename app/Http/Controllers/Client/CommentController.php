<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Client\ClientController;
use App\Models\Chapter;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends ClientController
{
    public function store(Request $request, Comic $comic)
    {
        $comic->comments()->create([
            'user_id' => Auth::user()->id,
            'content' => $request->content
        ]);
        return redirect()->back();
    }
}
