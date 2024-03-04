<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Film;

class CommentController extends Controller
{
    public function saveComment(Request $request)
    {
        
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->film_id = $request->input('film_id');
        $comment->user_id = $request->input('user_id');
        $comment->save();

        // You can return a success response if needed
        return response()->json(['success' => true]);
    }



    public function deleteComment(Comment $comment)
    {


        if ($comment->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Delete the comment
        $comment->delete();

        // Return success response
        return response()->json(['success' => true]);
    }


    public function getComments(Film $film)
    {
        // Assuming you have a relationship between Film and Comment models
        $comments = $film->comments()->with('user')->get();

        // Return the comments as JSON
        return response()->json(['comments' => $comments]);
    }
}
