<?php

namespace App\Http\Controllers\Admin\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;

class EditController extends Controller
{
    public function __invoke(Country $country)
    {
        
        return view('country.edit', compact('country'));
        
    }
}
