<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;


Route::get('/admin-001-login', function () {
    return view('components.auth.sign-in.admin');
});

Route::controller(LayoutController::class)->group(function () {
    Route::get('/', 'index')->name('/');
});

Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('sign-in', 'user');
        Route::get('ghost', 'ghost');
        Route::post('sign-in/{level}', 'store')->name('login.store');
    });

    Route::controller(RegisterController::class)->group(function () {
        Route::get('sign-up', 'index');
        Route::post('sign-up', 'store');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(LogoutController::class)->group(function () {
        Route::get('sign-out', 'index')->name('logout');
    });
});