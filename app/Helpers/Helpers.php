<?php

namespace App\Helpers;

use Carbon\Carbon;

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

    public static function calculateRemainingTime($startedAt, $endedAt)
    {
        $startedAt = Carbon::parse($startedAt);
        $endedAt = Carbon::parse($endedAt);

        // Hitung sisa waktu antara dua tanggal dalam tahun, bulan, dan hari
        $remainingYears = $startedAt->diffInYears($endedAt);
        $remainingMonths = $startedAt->diffInMonths($endedAt) % 12;
        $remainingDays = $startedAt->diffInDays($endedAt) % 30;

        $remainingTime = '';

        // Jika sisa waktu lebih dari 1 tahun, tampilkan dalam format tahun, bulan, hari
        if ($remainingYears > 0) {
            $remainingTime .= "$remainingYears Year, ";
            $remainingTime .= "$remainingMonths Month, ";
            $remainingTime .= "$remainingDays Day";
        }
        // Jika sisa waktu kurang dari 1 tahun, tampilkan dalam format bulan, hari
        elseif ($remainingMonths > 0) {
            $remainingTime .= "$remainingMonths Month, ";
            $remainingTime .= "$remainingDays Day";
        }
        // Jika sisa waktu kurang dari 1 bulan, tampilkan hanya dalam hari
        else {
            $remainingTime .= "$remainingDays Day";
        }

        return $remainingTime;
    }

    public static function convertGramToKg($weightGram)
    {
        if ($weightGram >= 1000) {
            $weightKg = $weightGram / 1000;
            return number_format($weightKg) . ' Kg';
        } else {
            return $weightGram . ' gram';
        }
    }
}