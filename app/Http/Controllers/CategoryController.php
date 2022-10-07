<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    private $_view = "admin";

    public function index()
    {
        $categories = Category::all();
        return view($this->_view . '/index', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
    }
}
