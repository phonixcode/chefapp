<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $categories = Category::get();
        $recipes = Recipe::with('images')->latest()->get();
        $chefs = User::randomChefs(4)->get();
        return view('user.home', compact('categories', 'recipes', 'chefs'));
    }

    public function about()
    {
        $chefs = User::randomChefs(4)->get();
        return view('user.about', compact('chefs'));
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function recipe()
    {
        $categories = Category::get();
        $recipes = $this->getRecipes();
        return view('user.recipe', compact('categories', 'recipes'));
    }

    public function recipeFilter(Request $request)
    {
        $data = $request->all();

        // sort filter
        $sortByUrl = '';
        if (!empty($data['sortBy'])) {
            $sortByUrl .= '&sortBy=' . $data['sortBy'];
        }

        // category filter
        $categoryURL = '';
        if(!empty($data['category'])) {
            $categoryURL .= '&category=' . $data['category'];
        }

        $searchURL = '';
        if(!empty($data['search'])) {
            $categoryURL .= '&search=' . $data['search'];
        }

        return redirect()->route('recipes', $sortByUrl . $categoryURL. $searchURL);
    }

    private function getRecipes()
    {
        $recipes = Recipe::query();

        if(!empty($_GET['category'])){
            $cat_id = Category::where('slug', $_GET['category'])->first()->id;
            $recipes = $recipes->where('category_id', $cat_id);
        }

        if(!empty($_GET['search'])){
            $recipes = $recipes->where('title', 'LIKE', '%' . $_GET['search'] . '%');
        } 

        if (!empty($_GET['sortBy'])) {
            if ($_GET['sortBy'] == 'priceAsc') {
                $recipes = $recipes->orderBy('price', 'ASC');
            }
            if ($_GET['sortBy'] == 'priceDesc') {
                $recipes = $recipes->orderBy('price', 'DESC');
            }
            if ($_GET['sortBy'] == 'titleAsc') {
                $recipes = $recipes->orderBy('title', 'ASC');
            }
            if ($_GET['sortBy'] == 'titleDesc') {
                $recipes = $recipes->orderBy('title', 'DESC');
            }
            if ($_GET['sortBy'] == 'newest') {
                $recipes = $recipes->latest();
            }
        }

        $recipes = $recipes->with('images')->latest()->paginate(12);

        return $recipes;
    }

    public function recipeDetails($slug)
    {
        // Fetch the recipe along with its images
        $recipe = Recipe::getRecipeBySlug($slug);

        if (!$recipe) {
            // Handle the case where the recipe is not found
            abort(404);
        }

        // Fetch related recipes from the same category, excluding the current recipe
        $relatedRecipes = Recipe::getRelatedRecipes($recipe->category_id, $recipe->id, 6);

        return view('user.recipe_details', compact('recipe', 'relatedRecipes'));
    }

    public function chefs()
    {
        $chefs = User::chefs()->latest()->paginate(12);
        return view('user.chef', compact('chefs'));
    }

    public function blog()
    {
        return view('user.blog');
    }

    public function cart()
    {
        return view('user.cart');
    }

    public function checkout()
    {
        return view('user.checkout');
    }

    public function wishlist()
    {
        return view('user.wishlist');
    }
}
