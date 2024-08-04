<?php

namespace App\Repository;

use App\Models\Recipe;

class RecipeRepository extends BaseRepository
{
    public function __construct(Recipe $model)
    {
        parent::__construct($model);
    }
}