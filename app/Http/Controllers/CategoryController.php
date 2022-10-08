<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest as MainRequest;
use App\Model\Category as MainModel;
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

    public function edit($id)
    {
        $category = MainModel::find($id);
        if ($category) {
            return view($this->_view . 'edit', [
                'category' => $category
            ]);
        }
        return redirect()->route('admin.category.index');
    }

    public function update(MainRequest $request)
    {
        $category = MainModel::find($request->id);
        if($category) {
            $category->update($request->all());
        }
        return redirect(route('admin.category.index'));
    }

    public function changeStatusActive($id)
    {
        $category = MainModel::find($id);
        if ($category) {
            $category->status = "active";
            $category->save();
        }
        return redirect()->back();
    }
    public function changeStatusDisable($id)
    {
        $category = MainModel::find($id);
        if ($category) {
            $category->status = "disabled";
            $category->save();
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $category = MainModel::find($id);
        if ($category) {
            $category->delete();
        }
        return redirect()->back();
    }
}
