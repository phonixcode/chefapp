<?php

if (!function_exists('formatViews')) {
    function formatViews($number)
    {
        if ($number >= 1000000) {
            $formatted = number_format($number / 1000000, 1);
            return rtrim($formatted, '.0') . 'M';
        } elseif ($number >= 1000) {
            $formatted = number_format($number / 1000, 1);
            return rtrim($formatted, '.0') . 'k';
        }
        return $number;
    }
}

