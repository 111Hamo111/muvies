<?php

namespace App\Http\Controllers\Admin\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;

class IndexController extends Controller
{
    public function __invoke()
    {
        $countries = Country::all();
        return view('country.index', compact('countries'));
        
    }
}
