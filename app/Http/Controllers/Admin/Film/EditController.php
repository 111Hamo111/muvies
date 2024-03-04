<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Country;
use App\Models\Director;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Operator;
use App\Models\Year;

class EditController extends Controller
{
    public function __invoke(Film $film)
    {
        $actors = Actor::all();
        $genres = Genre::all();
        $countries = Country::all();
        $operators = Operator::all();
        $directors = Director::all();
        $years = Year::all();
        $selects = Film::getSelects();
        return view('admin.film.edit' , compact('film','actors','genres','countries','operators','directors','years', 'selects'));
    }

}