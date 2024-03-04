<?php


namespace App\Http\Controllers\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;


class ShowController extends Controller
{
    public function __invoke(Request $request, Film $film)
    {     
        $comments = $film->comments()->paginate(2);

        if ($request->ajax()) {
            return response()->json(['comments' => $comments->items(), 'links' => $comments->links()->toHtml()]);
        }
        return view('film.show', compact('film', 'comments'));
    }
  
}
