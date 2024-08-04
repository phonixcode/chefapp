<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecipeImage extends Model
{
    use HasFactory;

    protected $fillable = ['recipe_id', 'image_path'];

    protected $appends = ['url'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function getUrlAttribute()
    {
        return Storage::disk('public')->url($this->image_path);
    }
}
