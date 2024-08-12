<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\RecipeReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeReviewController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'rate' => 'required|integer|min:1|max:5',
            'recipe_id' => 'required|exists:recipes,id',
            'review' => 'nullable|string|max:150',
        ]);

        RecipeReview::create([
            'user_id' => Auth::id(),
            'recipe_id' => $request->recipe_id,
            'rating' => $request->rate,
            'review' => $request->review,
        ]);

        return response()->json(['success' => true]);
    }

    public function list(Recipe $recipe)
    {
        return view('partials.reviews', ['recipe' => $recipe]);
    }

    public function count($id)
    {
        $count = RecipeReview::where('recipe_id', $id)->count();
        return response()->json($count);
    }

}
