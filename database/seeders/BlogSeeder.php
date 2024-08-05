<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();
        
        $description = 'Herbs are fun and easy to grow. When harvested they make even the simplest meal seem like a gourmet delight. By using herbs in your cooking you can easily change the flavors of your recipes in many different ways, according to which herbs you add...';
        $long_description = '
            <div class="blog__details__text" style="color: rgb(33, 37, 41); font-family: Montserrat, sans-serif; font-size: 16px;"><p style="margin-bottom: 30px; font-size: 16px; color: rgb(68, 68, 68); line-height: 28px;">The cast brass and cast stainless steel burners have the smallest burrs — by far. This will mean less chaos in the gas flow, fewer trapped particulate matter in the burner and a cleaner burning grill. The following comparison shows how the ports are formed.</p><p style="font-size: 16px; color: rgb(68, 68, 68); line-height: 28px;">Why is port formation important? Several reasons. If the hole is punched into a sheet metal burner, it leaves a large tab inside the burner that will caus e more chaos while burning. It is more apt to hold trapped food particles and grease, and is therefore more likely to burn through. (Note the Alfresco burner photo below.</p></div><div class="blog__details__recipe" style="padding: 25px 70px 20px; overflow: hidden; background: rgb(245, 245, 245); margin-top: 40px; margin-bottom: 50px; color: rgb(33, 37, 41); font-family: Montserrat, sans-serif; font-size: 16px;"><div class="blog__details__recipe__item" style="width: 203.312px; float: left;"><h6 style="margin-bottom: 10px; line-height: 1.2; font-size: 16px; color: rgb(17, 17, 17); font-family: Montserrat, sans-serif; text-transform: uppercase;"><img src="img/blog/details/user.png" alt="" style="max-width: 100%; margin-right: 8px;">&nbsp;SERVES</h6><span style="font-size: 14px; color: rgb(136, 136, 136);">2 as a main, 4 as a side</span></div><div class="blog__details__recipe__item" style="width: 203.312px; float: left;"><h6 style="margin-bottom: 10px; line-height: 1.2; font-size: 16px; color: rgb(17, 17, 17); font-family: Montserrat, sans-serif; text-transform: uppercase;"><img src="img/blog/details/clock.png" alt="" style="max-width: 100%; margin-right: 8px;">&nbsp;PREP TIME</h6><span style="font-size: 14px; color: rgb(136, 136, 136);">15 minute</span></div><div class="blog__details__recipe__item" style="width: 203.312px; float: left;"><h6 style="margin-bottom: 10px; line-height: 1.2; font-size: 16px; color: rgb(17, 17, 17); font-family: Montserrat, sans-serif; text-transform: uppercase;"><img src="img/blog/details/clock.png" alt="" style="max-width: 100%; margin-right: 8px;">&nbsp;COOK TIME</h6><span style="font-size: 14px; color: rgb(136, 136, 136);">15 minute</span></div></div><div class="blog__details__recipe__details" style="margin-bottom: 38px; color: rgb(33, 37, 41); font-family: Montserrat, sans-serif; font-size: 16px;"><div class="row"><div class="col-lg-6" style="width: 390px;"><div class="blog__details__ingredients"><h6 style="margin-bottom: 20px; line-height: 1.2; font-size: 16px; color: rgb(17, 17, 17); font-family: Montserrat, sans-serif; text-transform: uppercase; letter-spacing: 0.5px;">Ingredients</h6><ul style="padding-left: 0px;"><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="font-weight: 600; position: absolute; left: 0px; top: -5px;">.</span>1 cup (240 ml) whole milk</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="font-weight: 600; position: absolute; left: 0px; top: -5px;">.</span>1 cup (240 ml) water, plus more as needed</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="font-weight: 600; position: absolute; left: 0px; top: -5px;">.</span>1 teaspoon fine sea salt</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="font-weight: 600; position: absolute; left: 0px; top: -5px;">.</span>2 tablespoons olive oil</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="font-weight: 600; position: absolute; left: 0px; top: -5px;">.</span>3/4 cup (120 g) fine polenta</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="font-weight: 600; position: absolute; left: 0px; top: -5px;">.</span>3 cups sunflower oil, plus more as needed</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="font-weight: 600; position: absolute; left: 0px; top: -5px;">.</span>7 ounces (200 g) peeled parsnips,</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="font-weight: 600; position: absolute; left: 0px; top: -5px;">.</span>1 pinch fine sea salt, plus more to taste</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="font-weight: 600; position: absolute; left: 0px; top: -5px;">.</span>2 tablespoons (30 g) unsalted butter</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="font-weight: 600; position: absolute; left: 0px; top: -5px;">.</span>1/2 tablespoon maple syrup</li></ul></div></div><div class="col-lg-6" style="width: 390px;"><div class="blog__details__ingredients__pic"><img src="img/blog/details/blog-details.jpg" alt="" style="max-width: 100%;"></div></div></div></div><div class="blog__details__direction" style="margin-bottom: 40px; color: rgb(33, 37, 41); font-family: Montserrat, sans-serif; font-size: 16px;"><h6 style="margin-bottom: 20px; line-height: 1.2; font-size: 16px; color: rgb(17, 17, 17); font-family: Montserrat, sans-serif; text-transform: uppercase; letter-spacing: 0.5px;">Directions</h6><ul style="padding-left: 0px;"><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="position: absolute; left: 0px; top: 0px;">01.</span>Combine all of the ingredients, kneading to form a smooth dough.</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="position: absolute; left: 0px; top: 0px;">02.</span>Allow the dough to rise, in a lightly greased, covered bowl, until it’s doubled in size,</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="position: absolute; left: 0px; top: 0px;">03.</span>about 90 minutes.</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="position: absolute; left: 0px; top: 0px;">04.</span>Gently divide the dough in half; it’ll deflate somewhat. Gently shape the dough into two oval loaves; or, for longer loaves, two 10″ to 11″ logs.</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="position: absolute; left: 0px; top: 0px;">05.</span>Place the loaves on a lightly greased or parchment-lined baking sheet. Cover and let</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="position: absolute; left: 0px; top: 0px;">06.</span>rise until very puffy, about 1 hour. Towards the end of the rising time, preheat the oven</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="position: absolute; left: 0px; top: 0px;">07.</span>to 425°F.</li><li style="list-style: none; color: rgb(68, 68, 68); line-height: 30px; letter-spacing: 1px; padding-left: 40px; position: relative;"><span style="position: absolute; left: 0px; top: 0px;">08.</span>Spray the loaves with lukewarm water. Make two fairly deep diagonal slashes in each; a serrated bread knife, wielded firmly,</li></ul></div>
        ';
        $blogs = [
            [
                'title'             => 'Delivering Kisses And Miracles',
                'description'       => $description,
                'long_description'  => $long_description,
                'photo'             => 'blog_images/blog-1.jpg',
                'views'             => 100,
                'user_id'           => $admin->random()->id,
            ],
            [
                'title'             => 'Make Grilling A Healthy Experience',
                'description'       => $description,
                'long_description'  => $long_description,
                'photo'             => 'blog_images/blog-2.jpg',
                'views'             => 5000,
                'user_id'           => $admin->random()->id,
            ],
            [
                'title'             => 'Bbq Myths Getting You Down',
                'description'       => $description,
                'long_description'  => $long_description,
                'photo'             => 'blog_images/blog-3.jpg',
                'views'             => 1000000,
                'user_id'           => $admin->random()->id,
            ],
            [
                'title'             => 'Keep That Cooking Area Clean',
                'description'       => $description,
                'long_description'  => $long_description,
                'photo'             => 'blog_images/blog-4.jpg',
                'views'             => 20000,
                'user_id'           => $admin->random()->id,
            ],
        ];

        foreach ($blogs as $item) {
            Blog::create([
                'title'             => $item['title'],
                'description'       => $item['description'],
                'long_description'  => $item['long_description'],
                'photo'             => $item['photo'],
                'views'             => $item['views'],
                'user_id'           => $item['user_id'],
            ]);
        }
    }
}
