<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Comic;
use App\Models\UserViewHistory;
use App\Models\ViewStatistic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $this->increaseView($request, $chapter);

            // Create View History
            $this->createViewHistory($chapter);
            
            $chapter->source = json_decode($chapter->source);
            return view($this->_pathView . 'index', [
                'comic' => $comic,
                'chapter' => $chapter
            ]);
        }
        return redirect(route('client.home'));
    }

    private function createViewHistory($chapter)
    {
        if(Auth::check()) {
            $userViewHistoryObj = UserViewHistory::where('user_id', Auth::user()->id)
                                                    ->where('chapter_id', $chapter->id)
                                                    ->get()
                                                    ->first();
            if($userViewHistoryObj == null) {
                UserViewHistory::create([
                    'user_id' => Auth::user()->id,
                    'chapter_id' => $chapter->id
                ]);
            } else {
                // if ($userViewHistoryObj->chapter->comic == $chapter->comic) {
                //     $userViewHistoryObj->chapter_id = $chapter->id;
                //     $userViewHistoryObj->save();
                // }
            }
        }
    }

    private function increaseView($request, $chapter)
    {
        $ipClient = $request->getClientIp();
        $viewObj = ViewStatistic::where('chapter_id', '=', $chapter->id)
                    ->where('ip_address', '=', $ipClient)
                    ->orderBy('created_at', 'DESC')
                    ->get()
                    ->first();
        if($viewObj == null) {
            ViewStatistic::create([
                'ip_address' => $ipClient,
                'chapter_id' => $chapter->id
            ]);
            $chapter->total_view = $chapter->total_view + 1;
            $chapter->save();
        } else {
            $timeNow        = Carbon::now();
            $lastViewTime   = $viewObj->created_at;
            // The rule is that each view of a client can only be increased at least once every 30 minutes
            if ($timeNow->diffInMinutes($lastViewTime) >= 30) {
                ViewStatistic::create([
                    'ip_address' => $ipClient,
                    'chapter_id' => $chapter->id
                ]);
                $chapter->total_view = $chapter->total_view + 1;
                $chapter->save();
            }
        }
    }
}
