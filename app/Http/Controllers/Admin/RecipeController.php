<?php

namespace App\Http\Controllers\Admin;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\RecipeRepository;
use App\Repository\CategoryRepository;

class RecipeController extends Controller
{
    protected $recipeRepository;
    protected $categoryRepository;

    public function __construct(RecipeRepository $recipeRepository, CategoryRepository $categoryRepository)
    {
        $this->recipeRepository = $recipeRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::where('user_id', auth()->id())->paginate(10);
        return view('admin.recipe.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryRepository->all();
        return view('admin.recipe.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'                     => 'required|string|max:255',
            'category_id'               => 'required|exists:categories,id',
            'price'                     => 'required|numeric',
            'description'               => 'required|string|',
            'additional_description'    => 'required|string',
            'recipe_information'        => 'required|string',
            'recipe_images.*'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $recipe = $this->recipeRepository->create($validatedData);

        if ($request->hasFile('recipe_images')) {
            $imagePaths = $this->recipeRepository->uploadFiles($request->file('recipe_images'), 'recipe_images');
            foreach ($imagePaths as $path) {
                $recipe->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('recipe-items.index')->with('success', 'Recipe saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $recipe = $this->recipeRepository->find($id);
        $categories = $this->categoryRepository->all();
        return view('admin.recipe.edit', compact('recipe', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Recipe $id)
    // {
    //     //
    // }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title'                     => 'required|string|max:255',
            'category_id'               => 'required|exists:categories,id',
            'price'                     => 'required|numeric',
            'description'               => 'required|string',
            'additional_description'    => 'required|string',
            'recipe_information'        => 'required|string',
            'recipe_images.*'           => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $recipe = $this->recipeRepository->find($id);
        $this->recipeRepository->update($id, $validatedData);

        // Handle image uploads
        if ($request->hasFile('recipe_images')) {
            // Delete old images
            foreach ($recipe->images as $image) {
                $this->recipeRepository->deleteFile($image->image_path);
                $image->delete();
            }

            // Upload new images
            $imagePaths = $this->recipeRepository->uploadFiles($request->file('recipe_images'), 'recipe_images');

            foreach ($imagePaths as $path) {
                $recipe->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('recipe-items.index')->with('success', 'Recipe updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $recipe = $this->recipeRepository->find($id);

        if ($recipe) {
            // Delete all associated images
            foreach ($recipe->images as $image) {
                $this->recipeRepository->deleteFile($image->image_path);
                $image->delete();
            }

            // Delete the recipe
            $this->recipeRepository->delete($id);
            
            return redirect()->back()->with('success', 'Recipe deleted successfully');
        }

        return redirect()->back()->with('error', 'Recipe not found');
    }
}
