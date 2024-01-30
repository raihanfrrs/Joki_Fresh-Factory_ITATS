<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::controller(GuestController::class)->group(function () {
        Route::get('about-us', 'about')->name('about');
        Route::get('service', 'service')->name('service');
        Route::get('our-properties', 'properties')->name('our.properties');
        Route::get('contact-us', 'contact')->name('contact');
    });
});