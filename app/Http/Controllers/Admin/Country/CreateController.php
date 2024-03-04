<?php

namespace App\Http\Controllers\Admin\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;

class CreateController extends Controller
{
    public function __invoke()
    {
        
        return view('country.create');
        
    }
}
