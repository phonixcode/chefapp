<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Repository\BlogRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $chefs = User::query();

        if(!empty($_GET['chef'])){
            $chefs = $chefs->where('name', 'LIKE', '%' . $_GET['chef'] . '%');
        } 

        $chefs = $chefs->chefs()->latest()->paginate(12);
        return view('user.chef', compact('chefs'));
    }

    public function chefDetails($id)
    {
        $chef = User::with('recipes')->findOrFail($id);

        return view('user.chef_details', compact('chef'));
    }

    public function blog()
    {
        $blog_lists = Blog::query();

        if(!empty($_GET['keyword'])){
            $blog_lists = $blog_lists->where('title', 'LIKE', '%' . $_GET['keyword'] . '%');
        } 

        $blog_lists = $blog_lists->with('user')->latest()->paginate(4);

        $popular_blogs = Blog::orderBy('views', 'desc')->limit(4)->get();
        return view('user.blog', compact('blog_lists', 'popular_blogs'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::getBlogBySlug($slug);

        $blog->views += 1;
        $blog->save();

        return view('user.blog_details', compact('blog'));
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
        $user = Auth::user();
        $wishlistItems = $user->wishlist()->with('recipe.images')->get();
        // return $wishlistItems;
        return view('user.wishlist', compact('wishlistItems'));
    }

    public function storeWishlist(Request $request)
    {
        $request->validate([
            'recipe_id' => 'required|exists:recipes,id',
        ]);

        $userId = auth()->id();
        $recipeId = $request->recipe_id;

        // Check if the item is already in the wishlist
        $existingWishlistItem = Wishlist::where('user_id', $userId)->where('recipe_id', $recipeId)->first();

        if ($existingWishlistItem) {
            return response()->json(['success' => false, 'message' => 'Recipe already in wishlist']);
        }

        // Add item to the wishlist
        $wishlist = new Wishlist();
        $wishlist->user_id = $userId;
        $wishlist->recipe_id = $recipeId;
        $wishlist->save();

        return response()->json(['success' => true, 'message' => 'Recipe added to wishlist']);
    }

    public function removeWishList(Request $request)
    {
        $request->validate([
            'recipe_id' => 'required|exists:wishlists,id',
        ]);

        $wishlistItem = Wishlist::find($request->recipe_id);

        // Ensure the item belongs to the authenticated user
        if ($wishlistItem->user_id !== Auth::id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        // Remove item from wishlist
        $wishlistItem->delete();

        return response()->json(['success' => true]);
    }

    public function sendEmail(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Prepare the email data
        $emailData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'userMessage' => $request->input('message'),
        ];

        // Send the email
        Mail::send('emails.contact', $emailData, function ($message) use ($request) {
            $message->to('admin@example.com')
                ->subject('New Contact Message')
                ->from($request->input('email'), $request->input('name'));
        });

        return response()->json(['success' => 'Message sent successfully!']);
    }
}
