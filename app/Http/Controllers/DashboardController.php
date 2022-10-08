<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Model\Category;
use App\Model\Chapter;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $_view = "admin.pages.dashboard.";

    public function index()
    {
        $totalCategory  = Category::all()->count();
        $totalChapter   = Chapter::all()->count();
        $totalUser      = User::all()->count();
        $totalComment   = Comment::all()->count();

        return view($this->_view . 'index', [
            'totalCategory' => $totalCategory,
            'totalChapter' => $totalChapter,
            'totalUser' => $totalUser,
            'totalComment' => $totalComment
        ]);
    }
}
