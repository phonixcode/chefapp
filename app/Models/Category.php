<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'slug'];

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
    
    protected function getSlugSource()
    {
        return $this->name; // Generate slug based on category name
    }
}
