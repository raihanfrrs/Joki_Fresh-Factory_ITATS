<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PricingController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['cekUserLogin:tenant']], function(){
    
    Route::controller(PricingController::class)->group(function () {
        Route::get('pricing', 'pricing_index')->name('pricing');
        Route::post('pricing/{warehouse}/cart', 'pricing_store_cart')->name('pricing.store.cart');
    });

    Route::controller(CartController::class)->group(function () {
        Route::get('shopping-cart', 'cart_index')->name('shopping.cart.index');
        Route::post('shopping-cart', 'cart_store')->name('shopping.cart.store');
        Route::get('shopping-cart/payment/{transaction}', 'cart_payment')->name('shopping.cart.payment');
    });
});