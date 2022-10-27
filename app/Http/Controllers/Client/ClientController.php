<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function __construct()
    {
        $categories          = Category::StatusActive()->get();
        $comicRecentComments = Comment::where('status', '=', 'active')->orderBy('created_at', 'DESC')->take(10)->get()->map(function($comment) {
            return $comment->comic;
        });

        view()->share([
            'categories' => $categories,
            'comicRecentComments' => $comicRecentComments
        ]);
    }
}
