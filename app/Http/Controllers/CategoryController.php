<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest as MainRequest;
use App\Model\Category as MainModel;
use App\Model\Category;
use App\Model\Comic;
use Composer\Util\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    private $_view = "admin.pages.category.";

    public function index()
    {
        $categories = MainModel::all();
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

    public function edit(Category $category)
    {
        return view($this->_view . 'edit', [
            'category' => $category
        ]);
    }

    public function update(MainRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect(route('admin.category.index'));
    }

    public function changeStatusActive(Category $category)
    {
        $category->status = "active";
        $category->save();
        return redirect()->back();
    }
    public function changeStatusDisable(Category $category)
    {
        $category->status = "inactive";
        $category->save();
        return redirect()->back();
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }

    public function listComic(Category $category)
    {
        return view($this->_view . 'listcomic', [
            'comics' => $category->comics,
            'category' => $category
        ]);
    }
}
