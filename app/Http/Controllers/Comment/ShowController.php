<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;

use App\Models\Film;

class ShowController extends Controller
{
   

    public function getComments(Film $film)
    {
        $comments = $film->comments()->with('user')->get();
        return response()->json(['comments' => $comments]);
    }
}
