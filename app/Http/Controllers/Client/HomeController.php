<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Comic;
use App\Model\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends ClientController
{
    private $_pathView = "client.pages.home.";

    public function index()
    {
        $comics = Comic::where('status', 'active')->get();
        $sliders = Slider::where('status', 'active')->get();

        return view($this->_pathView . 'index', [
            'comics' => $comics,
            'sliders' => $sliders
        ]);
    }
}
