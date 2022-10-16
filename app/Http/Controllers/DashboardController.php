<?php

namespace App\Http\Controllers;

use App\Model\Comment;
use App\Model\Category;
use App\Model\Chapter;
use App\Model\Comic;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $_view = "admin.pages.dashboard.";

    public function index()
    {
        $totalCategory  = Category::all()->count();
        $totalComic     = Comic::all()->count();
        $totalUser      = User::all()->count();
        $totalComment   = Comment::all()->count();

        return view($this->_view . 'index', [
            'totalCategory' => $totalCategory,
            'totalComic' => $totalComic,
            'totalUser' => $totalUser,
            'totalComment' => $totalComment
        ]);
    }
}
