<?php

namespace App\Http\Controllers\Admin\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;

class ShowController extends Controller
{
    public function __invoke(Country $country)
    {
        $films = $country->films;

        return view('country.show', compact('country', 'films'));
    }
}
