<?php

namespace App\Http\Controllers\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;

class IndexController extends Controller
{
    public function __invoke()
    {
        $films = Film::all();
        $selectedFilms = Film::getSelectedFilms();


        return view('film.index', compact('films', 'selectedFilms'));
    }
}
