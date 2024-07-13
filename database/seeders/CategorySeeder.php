<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Breakfast'],
            ['name' => 'Lunch'],
            ['name' => 'Dinner'],
            ['name' => 'Appetizer'],
            ['name' => 'Salad'],
            ['name' => 'Main-course'],
            ['name' => 'Side-dish'],
            ['name' => 'Baked-goods'],
            ['name' => 'Dessert'],
            ['name' => 'Snack'],
            ['name' => 'Soup'],
            ['name' => 'Vegetarian'],
            ['name' => 'African Cuisine'],
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat['name'],
            ]);
        }
    }
}
