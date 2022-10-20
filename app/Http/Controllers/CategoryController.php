<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest as MainRequest;
use App\Models\Category as MainModel;
use App\Models\Comic;
use Composer\Util\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    private $_view = "admin.pages.category.";

    public function index()
    {
        $categories = MainModel::paginate(10);
        return view($this->_view . 'list', [
            'categories' => $categories
        ]);
    }

    public function add()
    {
        return view($this->_view . 'add');
    }

    public function store(MainRequest $request)
    {
        MainModel::create($request->all());
        return redirect(route('admin.category.index'));
    }

    public function edit(MainModel $category)
    {
        return view($this->_view . 'edit', [
            'category' => $category
        ]);
    }

    public function update(MainRequest $request, MainModel $category)
    {
        $category->update($request->all());
        return redirect(route('admin.category.index'));
    }

    public function changeStatusActive(MainModel $category)
    {
        $category->status = "active";
        $category->save();
        return redirect()->back();
    }
    public function changeStatusDisable(MainModel $category)
    {
        $category->status = "inactive";
        $category->save();
        return redirect()->back();
    }

    public function destroy(MainModel $category)
    {
        $category->delete();
        return redirect()->back();
    }

    public function listComic(MainModel $category)
    {
        return view($this->_view . 'listcomic', [
            'comics' => $category->comics,
            'category' => $category
        ]);
    }
}
