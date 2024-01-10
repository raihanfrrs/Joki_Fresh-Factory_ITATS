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

        Route::get('master/tenant', 'master_tenant_index')->name('master.tenant');

        Route::get('master/storage', 'master_storage_index')->name('master.storage');

        Route::get('master/category', 'master_category_index')->name('master.category');
    });

    Route::controller(AdminReportingController::class)->group(function () {
        Route::get('report/sales', 'report_sales_index')->name('report.sales');

        Route::get('report/performance', 'report_performance_index')->name('report.performance');
    });
});