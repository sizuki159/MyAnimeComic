<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Comic;
use App\Models\ViewStatistic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChapterController extends ClientController
{
    private $_pathView = "client.pages.chapter.";

    public function read(Request $request, Category $category, Comic $comic, $chapterNumber)
    {
        if ($comic->category->is($category)) {
            $chapter = $comic->chapters()->where('chapter_number', '=', $chapterNumber)->first();
            if($chapter == null)
                return redirect(route('client.comic.detail', ['category' => $category, 'comic' => $comic]));

            // Increase ViewStatistics
            $ipClient = $request->getClientIp();
            $viewObj = ViewStatistic::where('chapter_id', '=', $chapter->id)
                        ->where('ip_address', '=', $ipClient)
                        ->orderBy('created_at', 'DESC')
                        ->get()
                        ->first();
            if($viewObj == null) {
                $this->increaseView($ipClient, $chapter);
            } else {
                $timeNow        = Carbon::now();
                $lastViewTime   = $viewObj->created_at;
                // The rule is that each view of a client can only be increased at least once every 30 minutes
                if ($timeNow->diffInMinutes($lastViewTime) >= 30) {
                    $this->increaseView($ipClient, $chapter);
                }
            }
            
            $chapter->source = json_decode($chapter->source);
            return view($this->_pathView . 'index', [
                'comic' => $comic,
                'chapter' => $chapter
            ]);
        }
        return redirect(route('client.home'));
    }

    private function increaseView($ipClient, $chapter)
    {
        ViewStatistic::create([
            'ip_address' => $ipClient,
            'chapter_id' => $chapter->id
        ]);
        $chapter->total_view = $chapter->total_view + 1;
        $chapter->save();
    }
}
