<?php

namespace App\Http\Controllers\Film;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {


        $query = $request->input('query');

        $films = Film::where('title', 'like', "%$query%")->get();

        return view('film.search-results', compact('films'));
    }
}
