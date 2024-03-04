<?php


namespace App\Http\Controllers\Admin\Actor;

use App\Http\Controllers\Controller;
use App\Models\Actor;


class ShowController extends Controller
{
    public function __invoke(Actor $actor)
    {     
         
        $films = $actor->films;
        return view('actor.show', compact('actor', 'films'));
    }
}
