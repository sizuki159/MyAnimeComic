<?php

namespace App\Http\Controllers;

use App\Model\Chapter;
use App\Model\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ChapterController extends Controller
{
    private $_view = "admin.pages.chapter.";

    public function list($comicId)
    {
        $comic = Comic::find($comicId);
        if ($comic) {
            return view($this->_view . 'list', [
                'chapters' => $comic->chapters,
                'comic' => $comic
            ]);
        }
    }

    public function preview($comicId, $chapterNumber)
    {
        $comic = Comic::find($comicId);
        if ($comic) {
            $chapter = $comic->chapters()->where('chapter_number', '=', $chapterNumber)->first();
            if ($chapter) {
                $chapter->source = json_decode($chapter->source);
                return view($this->_view . 'preview', [
                    'chapter' => $chapter
                ]);
            }


            // if(count($comic->chapters) > 0) {
            //     for ($i=0; $i < count($comic->chapters); $i++) { 
            //         $comic->chapters[$i]->source = json_decode($comic->chapters[$i]->source);
            //     }
            //     return view($this->_view . 'index', [
            //         'chapters' => $comic->chapters, true
            //     ]);
            // }
        }
    }

    public function add($comicId)
    {
        $comic = Comic::find($comicId);
        if ($comic) {
            $chapter_number = DB::table('chapters')->where('comic_id', $comicId)->max('chapter_number');
            $chapter_number = $chapter_number || 0;
            return view($this->_view . 'add', [
                'comic' => $comic,
                'chapter_number' => ($chapter_number + 1)
            ]);
        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'status'    => ['required', Rule::in(['active', 'disabled'])],
            'comic_id'  => 'required',
            'chapter_number'  => 'required',
            'image'     => 'required',
            'image.*'   => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        if ($request->hasFile('image')) {
            $image_number = 1;
            foreach ($request->file('image') as $file) {
                $name = $image_number++ . '.' . $file->extension();
                $path = public_path() . '/comics/' . $request->comic_id . '/chapters/' . $request->chapter_number . '/';
                $file->move($path, $name);
                $data[] = $name;
            }
        }

        $chapter = new Chapter();
        $chapter->name = $request->name;
        $chapter->chapter_number = $request->chapter_number;
        $chapter->comic_id = $request->comic_id;
        $chapter->source = json_encode($data);
        $chapter->status = $request->status;
        $chapter->save();

        return redirect(route('admin.chapters.list', ['comicId' => $request->comic_id]));
    }

    public function detail($comicId, $chapterId)
    {
        $comic = Comic::find($comicId);
        if ($comic) {
            return $comic->chapters;
        }
        return redirect()->back();
    }
}
