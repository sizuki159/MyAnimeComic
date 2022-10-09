<?php

namespace App\Http\Controllers;

use App\Model\Comic;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    private $_view = "admin.pages.chapter.";

    public function index($comicId)
    {
        $comic = Comic::find($comicId);
        if($comic) {
            return $comic->chapters;
        }
    }

    public function add($comicId)
    {
        $comic = Comic::find($comicId);
        if($comic) {
            return view($this->_view . 'add', [
                'comic' => $comic
            ]);
        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
    
    public function detail($comicId, $chapterId)
    {
        $comic = Comic::find($comicId);
        if($comic) {
            return $comic->chapters;
        }
        return redirect()->back();
    }
}
