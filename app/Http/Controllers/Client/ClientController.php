<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function __construct()
    {
        $categories = Category::StatusActive()->get();
        
        view()->share([
            'categories' => $categories
        ]);
    }
}
