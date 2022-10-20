<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Client\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends ClientController
{
    public function store(Request $request)
    {
        dd(Auth::user(), $request);
    }
}
