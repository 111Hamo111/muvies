<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;

class IndexController extends Controller
{
    public function __invoke()
    {
        $films = Film::all();
        $selectedFilms = Film::getSelectedFilms();


        return view('admin.film.index', compact('films', 'selectedFilms'));
    }
}
