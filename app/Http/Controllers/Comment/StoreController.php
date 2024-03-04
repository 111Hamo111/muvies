<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class StoreController extends Controller
{
    public function saveComment(Request $request)
    {
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->film_id = $request->input('film_id');
        $comment->user_id = $request->input('user_id');
        $comment->save();

        return response()->json(['success' => true]);
    }

   
}
