<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider as MainModel;
use App\Http\Requests\SliderRequest as MainRequest;
use App\Models\Slider;
use JsonSchema\Uri\Retrievers\FileGetContents;

class SliderController extends Controller
{
    private $_view = "admin.pages.slider.";

    public function index()
    {
        $sliders = MainModel::all();

        return view($this->_view . 'list', [
            'sliders' => $sliders
        ]);
    }

    public function add()
    {
        return view($this->_view . 'add');
    }

    public function store(MainRequest $request)
    {
        $slider = MainModel::create($request->except('image'));

        // Image to base64 encode
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $slider->image = "data:image/png;base64," . base64_encode(file_get_contents($file->path()));
            $slider->save();
        }
        return redirect(route('admin.slider.index'));
    }

    public function edit(Slider $slider)
    {
        return view($this->_view . 'edit', [
            'slider' => $slider
        ]);
    }

    public function update(MainRequest $request, Slider $slider)
    {
        $slider->update($request->except('image'));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $slider->image = "data:image/png;base64," . base64_encode(file_get_contents($file->path()));
            $slider->save();
        }
        return redirect(route('admin.slider.index'));
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->back();
    }

    public function changeStatusActive(Slider $slider)
    {
        $slider->status = 'active';
        $slider->save();
        return redirect()->back();
    }

    public function changeStatusDisable(Slider $slider)
    {
        $slider->status = 'inactive';
        $slider->save();
        return redirect()->back();
    }
}
