<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\YajraDatatablesController;
use Illuminate\Support\Facades\Route;

Route::controller(YajraDatatablesController::class)->group(function () {
    Route::get('listAdminsTable', 'admin_index');
    Route::get('listTenantsTable', 'tenant_index');
    Route::get('listWarehousesTable/{type}', 'warehouse_index');
    Route::get('listCategoriesTable', 'category_index');
    Route::get('listSubscriptionsTable', 'subscription_index');
    Route::get('listTaxesTable', 'taxes_index');
    Route::get('listRentalPriceCalculationsTable', 'rental_price_calculation_index');
    Route::get('listWarehouseSubscriptionsTable/{warehouse}', 'warehouse_subscription_index');
});

Route::controller(AjaxController::class)->group(function () {
    Route::get('ajax/admin-details/{admin}/{type}', 'admin_detail_show');
    Route::get('ajax/tenant-details/{tenant}/{type}', 'tenant_detail_show');
    Route::get('ajax/warehouse-details/{warehouse}/{type}', 'warehouse_detail_show');
    Route::get('ajax/admin/{user}/edit', 'admin_edit');
    Route::get('ajax/tenant/{tenant}/edit', 'tenant_edit');
    Route::get('ajax/warehouse-category/{warehouse_category}/edit', 'warehouse_category_edit');
    Route::get('ajax/tax/{tax}/edit', 'tax_edit');
    Route::get('ajax/subscription/{subscription}/edit', 'subscription_edit');
    Route::get('ajax/warehouse/show', 'warehouse_show');
    Route::get('ajax/warehouse_subscription/{warehouse_subscription}/edit', 'warehouse_subscription_store_edit');
    Route::get('ajax/tenant-details/shopping-cart-count', 'tenant_shopping_cart_count');
    Route::get('ajax/shopping-cart/{temp_transaction}/delete', 'tenant_shopping_cart_destroy');
    Route::post('ajax/shopping-cart/{temp_transaction}/update-subscription', 'tenant_shopping_cart_update_subscription');
});

