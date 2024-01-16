<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMasterController;
use App\Http\Controllers\AdminReportingController;

Route::group(['middleware' => ['cekUserLogin:admin']], function(){
    Route::controller(AdminMasterController::class)->group(function () {
        Route::get('master/admin', 'master_admin_index')->name('master.admin');
        Route::post('master/admin', 'master_admin_store')->name('master.admin.store');
        Route::get('master/admin/{admin}', 'master_admin_show')->name('master.admin.show');
        Route::delete('master/admin/{admin}', 'master_admin_destroy')->name('master.admin.destroy');
        Route::patch('master/admin/{admin}/status', 'master_admin_update_status')->name('master.admin.update.status');
        Route::patch('master/admin/{admin}', 'master_admin_update')->name('master.admin.update');

        Route::get('master/tenant', 'master_tenant_index')->name('master.tenant');
        Route::get('master/tenant/{tenant}', 'master_tenant_show')->name('master.tenant.show');
        Route::patch('master/tenant/{tenant}', 'master_tenant_update')->name('master.tenant.update');
        Route::delete('master/tenant/{tenant}', 'master_tenant_destroy')->name('master.tenant.destroy');
        Route::patch('master/tenant/{tenant}/status', 'master_tenant_update_status')->name('master.tenant.update.status');

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
    });

    Route::controller(AdminReportingController::class)->group(function () {
        Route::get('report/sales', 'report_sales_index')->name('report.sales');

        Route::get('report/performance', 'report_performance_index')->name('report.performance');
    });
});