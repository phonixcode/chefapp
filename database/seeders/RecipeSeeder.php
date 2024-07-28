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
                'title' => 'Shawama',
                'description' => 'Description of Shawarma',
                'price' => 10.99,
                'label' => 'Lunch',
                'user_id' => $chefs->random()->id,
                'category_id' => $categories->random()->id,
                'recipe_information' => '<h1>Shawarma Recipe</h1>

                <h2>Ingredients</h2>
                <ul>
                  <li>2 lbs boneless chicken thighs</li>
                  <li>1/4 cup plain yogurt</li>
                  <li>1/4 cup olive oil</li>
                  <li>2 tablespoons lemon juice</li>
                  <li>4 garlic cloves, minced</li>
                  <li>1 teaspoon ground cumin</li>
                  <li>1 teaspoon ground paprika</li>
                  <li>1 teaspoon ground coriander</li>
                  <li>1/2 teaspoon ground turmeric</li>
                  <li>1/2 teaspoon ground cinnamon</li>
                  <li>1/2 teaspoon ground black pepper</li>
                  <li>1/2 teaspoon salt</li>
                  <li>1/4 teaspoon cayenne pepper</li>
                  <li>6 pita bread or flatbreads</li>
                  <li>2 tomatoes, sliced</li>
                  <li>1 cucumber, sliced</li>
                  <li>1/2 red onion, thinly sliced</li>
                  <li>1/4 cup chopped fresh parsley</li>
                  <li>Optional: Tahini sauce, hummus, or garlic sauce for serving</li>
                </ul>
                
                <h2>Instructions</h2>
                <ol>
                  <li>In a large bowl, mix together the yogurt, olive oil, lemon juice, garlic, cumin, paprika, coriander, turmeric, cinnamon, black pepper, salt, and cayenne pepper to make the marinade.</li>
                  <li>Add the chicken thighs to the marinade and ensure they are fully coated. Cover the bowl and refrigerate for at least 1 hour, or up to overnight for better flavor.</li>
                  <li>Preheat your grill or stovetop griddle to medium-high heat. Lightly oil the grill grates or griddle surface.</li>
                  <li>Remove the chicken from the marinade and grill the chicken thighs for about 6-8 minutes per side, or until they are fully cooked and have nice grill marks. The internal temperature should reach 165°F (75°C).</li>
                  <li>Let the chicken rest for a few minutes, then slice it thinly against the grain.</li>
                  <li>Warm the pita bread or flatbreads on the grill for a few seconds on each side until they are soft and pliable.</li>
                  <li>Assemble the shawarma: place a few slices of chicken in the center of each pita or flatbread. Top with slices of tomato, cucumber, red onion, and chopped parsley.</li>
                  <li>Drizzle with tahini sauce, hummus, or garlic sauce if desired. Roll up the pita or flatbread around the filling to create a wrap.</li>
                  <li>Serve immediately and enjoy your homemade shawarma!</li>
                </ol>
                
                <h2>Tips</h2>
                <ul>
                  <li>For extra flavor, marinate the chicken overnight.</li>
                  <li>Use a meat thermometer to ensure the chicken is fully cooked.</li>
                  <li>Customize the toppings according to your preference.</li>
                  <li>If you prefer a spicier shawarma, increase the amount of cayenne pepper in the marinade.</li>
                </ul>
                '
            ],
            [
                'title' => 'Chin Chin',
                'description' => 'Description of Chin Chin',
                'price' => 20.90,
                'label' => 'Breakfast',
                'user_id' => $chefs->random()->id,
                'category_id' => $categories->random()->id,
                'recipe_information' => '<h1>Chin Chin Recipe</h1>

                <h2>Ingredients</h2>
                <ul>
                  <li>4 cups all-purpose flour</li>
                  <li>1/2 cup granulated sugar</li>
                  <li>1/2 cup powdered milk</li>
                  <li>1/2 teaspoon ground nutmeg</li>
                  <li>1/2 teaspoon baking powder</li>
                  <li>1/2 teaspoon salt</li>
                  <li>1/2 cup unsalted butter, melted</li>
                  <li>2 large eggs</li>
                  <li>1/2 cup water (or as needed)</li>
                  <li>Vegetable oil for frying</li>
                </ul>
                
                <h2>Instructions</h2>
                <ol>
                  <li>In a large mixing bowl, combine the flour, sugar, powdered milk, nutmeg, baking powder, and salt.</li>
                  <li>Add the melted butter to the dry ingredients and mix well until the mixture becomes crumbly.</li>
                  <li>In a separate bowl, beat the eggs and add them to the flour mixture. Mix thoroughly.</li>
                  <li>Add water gradually, a little at a time, while kneading the dough until it comes together and is smooth. The dough should not be too sticky or too dry.</li>
                  <li>Cover the dough with a clean cloth and let it rest for about 15 minutes.</li>
                  <li>On a lightly floured surface, roll out the dough to about 1/4 inch thickness.</li>
                  <li>Using a knife or a pizza cutter, cut the dough into small squares or rectangles, about 1 inch in size.</li>
                  <li>Heat vegetable oil in a deep frying pan or pot over medium heat. The oil should be deep enough to allow the chin chin pieces to float.</li>
                  <li>Fry the chin chin pieces in batches, turning them occasionally, until they are golden brown and crispy. This should take about 2-3 minutes per batch.</li>
                  <li>Use a slotted spoon to remove the chin chin from the oil and place them on paper towels to drain excess oil.</li>
                  <li>Allow the chin chin to cool completely before serving or storing in an airtight container.</li>
                </ol>
                
                <h2>Tips</h2>
                <ul>
                  <li>Ensure the oil is not too hot to prevent the chin chin from burning before cooking through.</li>
                  <li>If the dough is too sticky, add a little more flour. If it is too dry, add a little more water.</li>
                  <li>You can flavor your chin chin with vanilla extract or any other flavor of your choice.</li>
                  <li>Store chin chin in an airtight container to keep it fresh and crispy.</li>
                </ul>
                '
            ],
            [
                'title' => 'Jollof Rice',
                'description' => 'Description of Jollof Rice',
                'price' => 50.90,
                'label' => 'Dinner',
                'user_id' => $chefs->random()->id,
                'category_id' => $categories->random()->id,
                'recipe_information' => '<h1>Jollof Rice Recipe</h1>

                <h2>Ingredients</h2>
                <ul>
                  <li>2 cups long-grain parboiled rice</li>
                  <li>1/4 cup vegetable oil</li>
                  <li>1 large onion, finely chopped</li>
                  <li>2 garlic cloves, minced</li>
                  <li>1 thumb-sized piece of ginger, minced</li>
                  <li>1 red bell pepper, chopped</li>
                  <li>1 green bell pepper, chopped</li>
                  <li>2 medium carrots, chopped</li>
                  <li>1 cup green peas</li>
                  <li>1 cup chopped tomatoes (or 1 can of chopped tomatoes)</li>
                  <li>3 tablespoons tomato paste</li>
                  <li>1 teaspoon dried thyme</li>
                  <li>1 teaspoon curry powder</li>
                  <li>1 teaspoon paprika</li>
                  <li>1 teaspoon ground black pepper</li>
                  <li>1 teaspoon salt (or to taste)</li>
                  <li>2 cups chicken broth (or water)</li>
                  <li>2 bay leaves</li>
                  <li>1 scotch bonnet pepper (optional, for heat)</li>
                  <li>2-3 sprigs of fresh thyme (optional, for extra flavor)</li>
                  <li>Cooked chicken, beef, or fish (optional, for serving)</li>
                </ul>
                
                <h2>Instructions</h2>
                <ol>
                  <li>Rinse the rice under cold water until the water runs clear. Set aside.</li>
                  <li>Heat the vegetable oil in a large pot over medium heat. Add the chopped onions and sauté until translucent.</li>
                  <li>Add the minced garlic and ginger, and sauté for another 1-2 minutes until fragrant.</li>
                  <li>Add the chopped tomatoes and tomato paste to the pot, and cook for about 5-7 minutes, stirring occasionally, until the tomatoes break down and the sauce thickens.</li>
                  <li>Stir in the dried thyme, curry powder, paprika, ground black pepper, and salt.</li>
                  <li>Add the chopped bell peppers, carrots, and green peas, and cook for another 2-3 minutes.</li>
                  <li>Pour in the chicken broth (or water) and bring the mixture to a boil.</li>
                  <li>Add the rinsed rice to the pot, stirring to combine. Add the bay leaves, scotch bonnet pepper, and fresh thyme sprigs if using.</li>
                  <li>Reduce the heat to low, cover the pot with a tight-fitting lid, and let the rice simmer for about 20-25 minutes, or until the rice is cooked and the liquid is absorbed. Avoid stirring the rice during this time to prevent it from becoming mushy.</li>
                  <li>Once the rice is cooked, remove the pot from the heat and let it sit, covered, for an additional 5 minutes.</li>
                  <li>Fluff the rice with a fork, remove the bay leaves, scotch bonnet pepper, and thyme sprigs.</li>
                  <li>Serve the jollof rice with cooked chicken, beef, or fish if desired. Enjoy!</li>
                </ol>
                
                <h2>Tips</h2>
                <ul>
                  <li>For a smoky flavor, you can slightly char the tomatoes and bell peppers before adding them to the pot.</li>
                  <li>Adjust the spice level by adding or omitting the scotch bonnet pepper.</li>
                  <li>Use freshly made tomato sauce for a richer flavor.</li>
                  <li>Leftover jollof rice can be stored in an airtight container in the refrigerator for up to 3 days.</li>
                </ul>
                '

            ],
            [
                'title' => 'Burger',
                'description' => 'Description of Burger',
                'price' => 10.99,
                'label' => 'Lunch',
                'user_id' => $chefs->random()->id,
                'category_id' => $categories->random()->id,
                'recipe_information' => '<h1>Burger Recipe</h1>

                <h2>Ingredients</h2>
                <ul>
                  <li>1 lb ground beef (80% lean)</li>
                  <li>1 teaspoon salt</li>
                  <li>1/2 teaspoon ground black pepper</li>
                  <li>1/2 teaspoon garlic powder</li>
                  <li>1/2 teaspoon onion powder</li>
                  <li>4 burger buns</li>
                  <li>4 slices cheddar cheese (optional)</li>
                  <li>1 large tomato, sliced</li>
                  <li>1 small red onion, sliced</li>
                  <li>4 lettuce leaves</li>
                  <li>Pickles (optional)</li>
                  <li>Ketchup, mustard, mayonnaise (optional)</li>
                </ul>
                
                <h2>Instructions</h2>
                <ol>
                  <li>Preheat your grill or stovetop griddle to medium-high heat.</li>
                  <li>In a large mixing bowl, combine the ground beef, salt, black pepper, garlic powder, and onion powder. Mix until just combined, being careful not to overwork the meat.</li>
                  <li>Divide the meat mixture into 4 equal portions and shape each portion into a patty about 1/2 inch thick. Make a slight indentation in the center of each patty with your thumb to prevent the burgers from puffing up while cooking.</li>
                  <li>Place the patties on the preheated grill or griddle. Cook for about 4-5 minutes on one side, until nicely browned. Flip the patties and cook for an additional 4-5 minutes, or until the internal temperature reaches 160°F (71°C) for well-done burgers.</li>
                  <li>If you are adding cheese, place a slice of cheddar cheese on each patty during the last minute of cooking, and cover the grill or use a lid to melt the cheese.</li>
                  <li>While the patties are cooking, lightly toast the burger buns on the grill or griddle for about 1-2 minutes, until golden brown.</li>
                  <li>Assemble the burgers: Place a lettuce leaf on the bottom half of each bun, followed by a cooked patty with melted cheese. Top with tomato slices, red onion slices, pickles (if using), and any desired condiments (ketchup, mustard, mayonnaise).</li>
                  <li>Cover with the top half of the buns and serve immediately. Enjoy your homemade burgers!</li>
                </ol>
                
                <h2>Tips</h2>
                <ul>
                  <li>For juicier burgers, avoid pressing down on the patties while they are cooking.</li>
                  <li>Customize your burgers with additional toppings such as bacon, avocado, or sautéed mushrooms.</li>
                  <li>For a healthier option, use ground turkey or chicken instead of beef.</li>
                  <li>If you prefer a different cheese, try Swiss, American, or blue cheese crumbles.</li>
                  <li>Leftover burger patties can be stored in an airtight container in the refrigerator for up to 3 days.</li>
                </ul>
                '
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
