<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComicRequest as MainRequest;
use App\Model\Category;
use App\Model\Comic as MainModel;
use Illuminate\Http\Request;

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
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $name = 'image.' . $file->extension();
            $path = public_path() . '/comics/' . $comic->id . '/';
            $file->move($path, $name);
            $comic->image = json_encode($name);
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

    public function update(MainRequest $request)
    {
        $comic = MainModel::find($request->comic_id);
        if($comic) {
            $comic->update($request->except('image'));
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $name = 'image.' . $file->extension();
                $path = public_path() . '/comics/' . $comic->id . '/';
                $file->move($path, $name);
                $comic->image = json_encode($name);
                $comic->save();
            }
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
