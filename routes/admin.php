<?php

use App\Http\Controllers\AdminCalculationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMasterController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminReportingController;

Route::group(['middleware' => ['cekUserLogin:admin']], function(){
    Route::controller(AdminMasterController::class)->group(function () {
        Route::get('master/admin', 'master_admin_index')->name('master.admin');
        Route::post('master/admin', 'master_admin_store')->name('master.admin.store');
        Route::get('master/admin/{admin}', 'master_admin_show')->name('master.admin.show');
        Route::delete('master/admin/{admin}', 'master_admin_destroy')->name('master.admin.destroy');
        Route::patch('master/admin/{admin}/status', 'master_admin_update_status')->name('master.admin.update.status');
        Route::patch('master/admin/{admin}', 'master_admin_update')->name('master.admin.update');
        Route::patch('master/admin/{admin}/image', 'master_admin_update_image')->name('master.admin.update.image');
        Route::patch('master/admin/{admin}/password', 'master_admin_update_password')->name('master.admin.update.password');

        Route::get('master/tenant', 'master_tenant_index')->name('master.tenant');
        Route::get('master/tenant/{tenant}', 'master_tenant_show')->name('master.tenant.show');
        Route::patch('master/tenant/{tenant}', 'master_tenant_update')->name('master.tenant.update');
        Route::delete('master/tenant/{tenant}', 'master_tenant_destroy')->name('master.tenant.destroy');
        Route::patch('master/tenant/{tenant}/status', 'master_tenant_update_status')->name('master.tenant.update.status');
        Route::patch('master/tenant/{tenant}/image', 'master_tenant_update_image')->name('master.tenant.update.image');
        Route::patch('master/tenant/{tenant}/password', 'master_tenant_update_password')->name('master.tenant.update.password');

        Route::get('master/warehouse', 'master_warehouse_index')->name('master.warehouse');
        Route::post('master/warehouse', 'master_warehouse_store')->name('master.warehouse.store');
        Route::get('master/warehouse/{warehouse}', 'master_warehouse_show')->name('master.warehouse.show');
        Route::patch('master/warehouse/{warehouse}', 'master_warehouse_update')->name('master.warehouse.update');
        Route::delete('master/warehouse/{warehouse}', 'master_warehouse_destroy')->name('master.warehouse.destroy');

        Route::get('master/category', 'master_category_index')->name('master.warehouse.category');
        Route::post('master/category', 'master_category_store')->name('master.warehouse.category.store');
        Route::get('master/category/{warehouse_category}', 'master_category_show')->name('master.warehouse.category.show');
        Route::patch('master/category/{warehouse_category}', 'master_category_update')->name('master.warehouse.category.update');
        Route::delete('master/category/{warehouse_category}', 'master_category_destroy')->name('master.warehouse.category.destroy');

        Route::get('master/subscription', 'master_subscription_index')->name('master.subscription');
        Route::post('master/subscription', 'master_subscription_store')->name('master.subscription.store');
        Route::get('master/subscription/{subscription}', 'master_subscription_show')->name('master.subscription.show');
        Route::patch('master/subscription/{subscription}', 'master_subscription_update')->name('master.subscription.update');
        Route::delete('master/subscription/{subscription}', 'master_subscription_destroy')->name('master.subscription.destroy');
    });

    Route::controller(AdminReportingController::class)->group(function () {
        Route::get('report/sales', 'report_sales_index')->name('report.sales');

        Route::get('report/performance', 'report_performance_index')->name('report.performance');
    });

    Route::controller(AdminProfileController::class)->group(function () {
        Route::get('profile/admin', 'admin_profile_index')->name('admin.profile');

        Route::get('settings/admin-profile', 'admin_setting_profile_index')->name('admin.settings.profile');
        Route::patch('settings/admin-profile/{admin}', 'admin_setting_profile_update')->name('admin.settings.profile.update');
        Route::get('settings/admin-password', 'admin_setting_password_index')->name('admin.settings.password');
        Route::patch('settings/admin-password/{admin}', 'admin_setting_password_update')->name('admin.settings.password.update');
    });

    Route::controller(AdminCalculationController::class)->group(function () {
        Route::get('calculation/rental-price', 'admin_calculation_rental_price_index')->name('calculation.rental.price');
        Route::get('calculation/rental-price/add', 'admin_calculation_rental_price_create');
        Route::post('calculation/rental-price/add/{warehouse}', 'admin_calculation_rental_price_store')->name('calculation.rental.price.store');
        Route::post('calculation/rental-price/add', 'admin_calculation_rental_price_save');
        Route::post('calculation/rental-price/cancel', 'admin_calculation_rental_price_cancel');
        Route::get('calculation/rental-price/{warehouse_subscription}/edit', 'admin_calculation_rental_price_edit');
        Route::patch('calculation/rental-price/{warehouse_subscription}', 'admin_calculation_rental_price_update');
    });
});