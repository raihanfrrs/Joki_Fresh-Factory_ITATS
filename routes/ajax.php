<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;

Route::controller(AjaxController::class)->group(function () {
    Route::get('ajax/master-admin-card', 'master_admin_card');
    Route::get('ajax/master-admin-table', 'master_admin_table');
});