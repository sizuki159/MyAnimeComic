<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComicRequest as MainRequest;
use App\Model\Category;
use App\Model\Comic as MainModel;
use App\Model\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComicController extends Controller
{
    private $_view = "admin.pages.comic.";

    public function index()
    {
        $comics = MainModel::all();

        return view($this->_view . 'list', [
            'comics' => $comics
        ]);
    }

    public function add()
    {
        $categories = Category::all();
        return view($this->_view . 'add', [
            'categories' => $categories
        ]);
    }

    public function store(MainRequest $request)
    {
        $comic = MainModel::create($request->except('image'));

        // Upload Image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            Storage::disk('do_spaces')->putFileAs($comic->id, $file, $filename, 'public');

            // Update record on database
            $comic->image = Storage::disk('do_spaces')->url($comic->id . '/' . $filename);
            $comic->save();
        }
        return redirect(route('admin.comic.index'));
    }

    public function edit(MainModel $comic)
    {
        $categories = Category::all();

        return view($this->_view . 'edit', [
            'comic' => $comic,
            'categories' => $categories
        ]);
    }

    public function update(MainRequest $request, Comic $comic)
    {
        $comic->update($request->except('image'));
        if ($request->hasFile('image')) {

            // delete old image
            $imageInfo  = pathinfo($comic->image);
            Storage::disk('do_spaces')->delete($comic->id . '/' . $imageInfo["basename"]);

            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            Storage::disk('do_spaces')->putFileAs($comic->id, $file, $filename, 'public');

            // Update record on database
            $comic->image = Storage::disk('do_spaces')->url($comic->id . '/' . $filename);
            $comic->save();
        }
        return redirect(route('admin.comic.index'));
    }

    public function changeStatusActive(MainModel $comic)
    {
        $comic->status = "active";
        $comic->save();
        return redirect()->back();
    }
    public function changeStatusDisable(MainModel $comic)
    {
        $comic->status = "disabled";
        $comic->save();
        return redirect()->back();
    }

    public function destroy(MainModel $comic)
    {
        $comic->delete();
        return redirect()->back();
    }
}
