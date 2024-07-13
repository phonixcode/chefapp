<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\RecipeImage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some users as chefs
        $chefs = User::whereHas('roles', function ($query) {
            $query->where('name', 'chef');
        })->get();

        // Get some categories
        $categories = Category::all();

        // sample recipes data
        $recipes = [
            [
                'title' => 'Recipe 1',
                'description' => 'Description of Recipe 1',
                'price' => 10.99,
                'label' => 'Lunch',
                'user_id' => $chefs->random()->id,
                'category_id' => $categories->random()->id,
            ],
            [
                'title' => 'Recipe 2',
                'description' => 'Description of Recipe 2',
                'price' => 20.90,
                'label' => 'Breakfast',
                'user_id' => $chefs->random()->id,
                'category_id' => $categories->random()->id,
            ],
            [
                'title' => 'Recipe 3',
                'description' => 'Description of Recipe 3',
                'price' => 50.90,
                'label' => 'Dinner',
                'user_id' => $chefs->random()->id,
                'category_id' => $categories->random()->id,
            ],
            [
                'title' => 'Recipe 4',
                'description' => 'Description of Recipe 4',
                'price' => 10.99,
                'label' => 'Lunch',
                'user_id' => $chefs->random()->id,
                'category_id' => $categories->random()->id,
            ],
        ];

        // Attach multiple images
        $images = [
            ['image_path' => '1.jpg'],
            ['image_path' => '2.jpg'],
            ['image_path' => '3.jpg'],
            ['image_path' => '4.jpg'],
            ['image_path' => '5.jpg'],
            ['image_path' => '6.jpg'],
            ['image_path' => '7.jpg'],
            ['image_path' => '8.jpg'],
            ['image_path' => '9.jpg'],
        ];

        // Create recipes
        foreach ($recipes as $recipeData) {
            $recipe = Recipe::create($recipeData);

            // Shuffle the images array
            $shuffledImages = $images;
            shuffle($shuffledImages);

            // Select a random number of images to attach (between 1 and the total number of images)
            $numImages = rand(1, count($shuffledImages));
            $selectedImages = array_slice($shuffledImages, 0, $numImages);

            foreach ($selectedImages as $imageData) {
                $recipe->images()->create($imageData);
            }
        }
    }
}
