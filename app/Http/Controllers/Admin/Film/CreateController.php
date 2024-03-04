<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Country;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Operator;
use App\Models\Year;

class CreateController extends Controller
{
    public function __invoke()
    {
        // Check if the logged-in user's ID is 1
            $actors = Actor::all();
            $genres = Genre::all();
            $countries = Country::all();
            $operators = Operator::all();
            $directors = Director::all();
            $years = Year::all();
            return view('admin.film.create', compact('actors', 'genres', 'countries', 'operators', 'directors', 'years'));
        
    }
}
