<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\Director;

class IndexController extends Controller
{
    public function __invoke()
    {
        $directors = Director::all();
        return view('director.index', compact('directors'));
        
    }
}
