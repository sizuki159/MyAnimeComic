<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comic;
use App\Models\Slider;
use App\Models\ViewStatistic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends ClientController
{
    private $_pathView = "client.pages.home.";

    public function index()
    {
        $comics     = Comic::where('status', 'active')->paginate(10);
        $sliders    = Slider::where('status', 'active')->get();


        $topViewDay = ViewStatistic::whereBetween('created_at', [Carbon::now()->subDays(1), Carbon::now()])
                                    ->get();
        //dd($topViewDay->first()->chapter->comic);

        return view($this->_pathView . 'index', [
            'comics' => $comics,
            'sliders' => $sliders
        ]);
    }
}
