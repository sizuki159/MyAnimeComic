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
        MainModel::create($request->all());
        return redirect(route('admin.comic.index'));
    }

    public function edit($id)
    {
        $comic = MainModel::find($id);
        $categories = Category::all();

        if ($comic) {
            return view($this->_view . 'edit', [
                'comic' => $comic,
                'categories' => $categories
            ]);
        }
        return redirect()->route('admin.comic.index');
    }

    public function update(MainRequest $request)
    {
        $comic = MainModel::find($request->comic_id);
        if($comic) {
            $comic->update($request->all());
        }
        return redirect(route('admin.comic.index'));
    }

    public function changeStatusActive($id)
    {
        $comic = MainModel::find($id);
        if ($comic) {
            $comic->status = "active";
            $comic->save();
        }
        return redirect()->back();
    }
    public function changeStatusDisable($id)
    {
        $comic = MainModel::find($id);
        if ($comic) {
            $comic->status = "disabled";
            $comic->save();
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $comic = MainModel::find($id);
        if ($comic) {
            $comic->delete();
        }
        return redirect()->back();
    }
}
