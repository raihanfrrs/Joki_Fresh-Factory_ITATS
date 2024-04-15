<?php

namespace App\Providers;

use App\Helpers\Helpers;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('rupiah', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
        });

        Blade::directive('convertMonthsToYearsAndMonths', function ($expression) {
            return "<?php echo \App\Helpers\Helpers::convertMonthsToYearsAndMonths($expression); ?>";
        });
        
        Blade::directive('calculateRemainingTime', function ($expression) {
            return "<?php echo \App\Helpers\Helpers::calculateRemainingTime($expression); ?>";
        });

        Blade::directive('convertGramToKg', function ($expression) {
            return "<?php echo \App\Helpers\Helpers::convertGramToKg($expression); ?>";
        });
    }
}
