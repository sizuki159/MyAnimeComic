<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Model\Category;
use Composer\Util\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    private $_view = "admin.pages.category.";

    public function index()
    {
        $categories = Category::all();
        return view($this->_view . 'list', [
            'categories' => $categories
        ]);
    }

    public function form()
    {
        return view($this->_view . 'form', [
        ]);
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect(route('admin.category.form'))->with('message', 'aaaa');
    }
}
