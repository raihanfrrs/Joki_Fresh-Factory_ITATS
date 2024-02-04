<?php

namespace App\Helpers;

class Helpers
{
    public static function convertMonthsToYearsAndMonths($months)
    {
        if ($months < 0) {
            return "Invalid input";
        } elseif ($months == 0) {
            return "Free";
        }

        $years = floor($months / 12);
        $remainingMonths = $months % 12;

        if ($years > 0 && $remainingMonths > 0) {
            return "{$years} Years {$remainingMonths} Month";
        } elseif ($years > 0) {
            return "{$years} Years";
        } else {
            return "{$remainingMonths} Month";
        }
    }
}