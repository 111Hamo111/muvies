<?php

namespace App\Http\Controllers\Admin\Actor;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Country;

class CreateController extends Controller
{
    public function __invoke()
    {
        $actors = Actor::all();
        $countries = Country::all();
        return view('actor.create', compact('actors','countries'));
    }

}
