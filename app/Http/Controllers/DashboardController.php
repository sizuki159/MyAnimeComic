<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $_view = "admin.pages.dashboard.";
    
    public function index()
    {
        $categories = Category::all()->count();
        return view($this->_view . 'index', [
            'categories' => $categories
        ]);
    }
}
