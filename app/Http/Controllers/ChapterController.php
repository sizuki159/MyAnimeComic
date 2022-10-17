<?php

namespace App\Http\Controllers;

use App\Model\Chapter;
use App\Model\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class ChapterController extends Controller
{
    private $_view = "admin.pages.chapter.";

    public function list(Comic $comic)
    {
        return view($this->_view . 'list', [
            'chapters' => $comic->chapters,
            'comic' => $comic
        ]);
    }

    public function preview(Comic $comic, $chapterNumber)
    {
        $chapter = $comic->chapters()->where('chapter_number', '=', $chapterNumber)->first();
        if ($chapter) {
            $chapter->source = json_decode($chapter->source);
            return view($this->_view . 'preview', [
                'chapter' => $chapter
            ]);
        }
    }

    public function add(Comic $comic)
    {
        $chapter_number = DB::table('chapters')->where('comic_id', $comic->id)->max('chapter_number');
        $chapter_number = $chapter_number == null ? 1 : ($chapter_number + 1);
        return view($this->_view . 'add', [
            'comic' => $comic,
            'chapter_number' => $chapter_number
        ]);
    }

    public function store(Request $request, Comic $comic)
    {
        $request->validate([
            'name'      => 'required',
            'status'    => ['required', Rule::in(['active', 'disabled'])],
            'chapter_number'  => 'required',
            'image'     => 'required',
            'image.*'   => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $data = [];
        if ($request->hasFile('image')) {
            $image_number = 1;
            foreach ($request->file('image') as $file) {
                $name = $image_number++ . '.' . $file->getClientOriginalExtension();
                $path = $comic->id . '/chapters/' . $request->chapter_number;
                Storage::disk('do_spaces')->putFileAs($path, $file, $name, 'public');
                $data[] = Storage::disk('do_spaces')->url($path . '/' . $name);
            }
        }

        $chapter = new Chapter();
        $chapter->name = $request->name;
        $chapter->chapter_number = $request->chapter_number;
        $chapter->source = json_encode($data);
        $chapter->status = $request->status;
        $comic->chapters()->save($chapter);

        return redirect(route('admin.chapters.list', ['comic' => $comic]));
    }

    public function detail(Comic $comic, Chapter $chapter)
    {
        return $comic->chapters;
    }

    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        return redirect()->back();
    }
}
