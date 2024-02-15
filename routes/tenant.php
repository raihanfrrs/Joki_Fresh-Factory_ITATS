<?php

use App\Http\Controllers\PricingController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['cekUserLogin:tenant']], function(){
    
    Route::controller(PricingController::class)->group(function () {
        Route::get('pricing', 'pricing_index')->name('pricing');
    });
});