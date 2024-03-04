<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Find or create a rating for the film by the current user
        $rating = Rating::updateOrCreate(
            ['user_id' => $user->id, 'film_id' => $request->film_id],
            ['rating' => $request->rating]
        );

        // Calculate the average rating for the film
        $averageRating = Rating::where('film_id', $request->film_id)->avg('rating');

        // Return a JSON response with the updated average rating
        return response()->json(['message' => 'Rating submitted successfully', 'average_rating' => $averageRating]);
    }
}
