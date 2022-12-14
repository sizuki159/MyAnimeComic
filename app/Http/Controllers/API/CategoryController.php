<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;


use App\Http\Resources\Category as CategoryRS;
use App\Http\Resources\CategoryCollection;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Xem thêm document tại https://laravel.com/docs/7.x/eloquent#collections
        return Category::where('status', 'active')
                        ->orderBy('id', 'asc')
                        ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // // cach 1
        // $category = new Category();
        // $category->name = $request->name;
        // $category->status = $request->status;
        // $category->save();

        // cach 2
        $category = Category::create($request->all());
        return response($category, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryCollection($category->comics);
        return new CategoryRS($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        dd($request, $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // https://laravel.com/docs/7.x/eloquent#soft-deleting

        $category->delete();
        return Response('', Response::HTTP_NO_CONTENT);
    }
}
