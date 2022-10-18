<?php

namespace App\Http\Controllers\Client;

use App\Model\Category;
use App\Model\Chapter;
use App\Model\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChapterController extends ClientController
{
    private $_pathView = "client.pages.chapter.";

    public function read(Category $category, Comic $comic, $chapterNumber)
    {
        if ($comic->category->is($category)) {
            $chapter = $comic->chapters()->where('chapter_number', '=', $chapterNumber)->first();
            if($chapter == null)
                return redirect(route('client.comic.detail', ['category' => $category, 'comic' => $comic]));

            $chapter->source = json_decode($chapter->source);
            return view($this->_pathView . 'index', [
                'comic' => $comic,
                'chapter' => $chapter
            ]);
        }
        return redirect(route('client.home'));
    }
}
