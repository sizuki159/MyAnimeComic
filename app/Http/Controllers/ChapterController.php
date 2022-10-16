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


        // if(count($comic->chapters) > 0) {
        //     for ($i=0; $i < count($comic->chapters); $i++) { 
        //         $comic->chapters[$i]->source = json_decode($comic->chapters[$i]->source);
        //     }
        //     return view($this->_view . 'index', [
        //         'chapters' => $comic->chapters, true
        //     ]);
        // }

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

        return redirect(route('admin.chapters.list', ['comic' => $request->comic_id]));
    }

    public function detail(Comic $comic, Chapter $chapter)
    {
        return $comic->chapters;
    }

    public function destroy(Chapter $chapter)
    {
        // $pathImage = public_path('comics\\' . $chapter->comic_id . '\chapters\\' . $chapter->chapter_number);
        // self::deleteDir($pathImage);
        
        Storage::disk(config('storage_path.comic') . $chapter->comic_id . '\chapters')->delete($chapter->chapter_number);

        $chapter->delete();
        return redirect()->back();
    }

    private static function deleteDir($dirPath)
    {
        if (!is_dir($dirPath)) {
            return;
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }
}
