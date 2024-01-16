<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\YajraDatatablesController;
use Illuminate\Support\Facades\Route;

Route::controller(YajraDatatablesController::class)->group(function () {
    Route::get('listAdminsTable', 'admin_index');
    Route::get('listTenantsTable', 'tenant_index');
    Route::get('listWarehousesTable', 'warehouse_index');
    Route::get('listCategoriesTable', 'category_index');
});

Route::controller(AjaxController::class)->group(function () {
    Route::get('ajax/admin-details/{admin}/{type}', 'admin_detail_show');
    Route::get('ajax/tenant-details/{tenant}/{type}', 'tenant_detail_show');
    Route::get('ajax/warehouse-details/{warehouse}/{type}', 'warehouse_detail_show');
    Route::get('ajax/admin/{user}/edit', 'admin_edit');
    Route::get('ajax/tenant/{tenant}/edit', 'tenant_edit');
    Route::get('ajax/warehouse/{warehouse}/edit', 'warehouse_edit');
    Route::get('ajax/warehouse-category/{warehouse_category}/edit', 'warehouse_category_edit');
});