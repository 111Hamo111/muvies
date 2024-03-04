<?php

namespace App\Http\Controllers\Admin\Actor;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Country;

class EditController extends Controller
{
    public function __invoke(Actor $actor)
    {
        
        $countries = Country::all();
        
        return view('actor.edit', compact('actor', 'countries'));

        
    }
}
