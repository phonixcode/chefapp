<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    public static function bootSluggable()
    {
        static::creating(function ($model) {
            $model->generateSlugOnCreate();
        });

        static::updating(function ($model) {
            $model->generateSlugOnUpdate();
        });
    }

    protected function generateSlugOnCreate()
    {
        $this->slug = Str::slug($this->getSlugSource());
    }

    protected function generateSlugOnUpdate()
    {
        $this->slug = Str::slug($this->getSlugSource());
    }

    protected function getSlugSource()
    {
        // Customize this method to return the source string for generating the slug
        // Example: return $this->title;
        return ''; // Replace with appropriate field or combination of fields
    }
}
