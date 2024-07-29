<?php

namespace App\Models;

use App\Traits\Sluggable;
use App\Traits\SkuGeneratable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory, Sluggable, SkuGeneratable;

    protected $fillable = [
        'user_id', 
        'category_id', 
        'title', 
        'slug',
        'description', 
        'long_description', 
        'additional_description', 
        'price', 
        'label', 
        'sku',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(RecipeImage::class);
    }

    // public function purchases()
    // {
    //     return $this->hasMany(Purchase::class);
    // }

    public function wishlistedBy()
    {
        return $this->hasMany(Wishlist::class);
    }

    protected function getSlugSource()
    {
        return $this->title; // Generate slug based on recipe title
    }

    public static function getRecipeBySlug($slug)
    {
        return self::where('slug', $slug)->with('images', 'category')->first();
    }

    public static function getRelatedRecipes($categoryId, $recipeId, $limit = 4)
    {
        return self::where('category_id', $categoryId)
            ->where('id', '!=', $recipeId)
            ->with('images', 'category')
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }
}
