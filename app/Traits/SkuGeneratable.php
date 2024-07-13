<?php

namespace App\Traits;

trait SkuGeneratable
{
    public static function bootSkuGeneratable()
    {
        static::creating(function ($model) {
            $model->generateSkuOnCreate();
        });
    }

    protected function generateSkuOnCreate()
    {
        $this->sku = $this->generateUniqueSku();
    }

    protected function generateUniqueSku()
    {
        $prefix = 'REP-'; // Customize prefix as needed
        $randomPart = strtoupper(substr(uniqid(), 7, 5)); // Generate random part of SKU

        return $prefix . $randomPart;
    }
}
