<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarehouseController;

Route::group(['middleware' => ['cekUserLogin:tenant']], function(){

    Route::controller(WarehouseController::class)->group(function () {
        Route::get('warehouse/{warehouse}', 'warehouse_index')->name('warehouse.index');
    });
    
    Route::controller(ProductController::class)->group(function () {
        Route::get('warehouse/{warehouse}/products', 'warehouse_product_index')->name('warehouse.products.index');
    });

    Route::controller(ProductCategoryController::class)->group(function () {
        Route::get('warehouse/{warehouse}/categories', 'warehouse_category_index')->name('warehouse.categories.index');
    });
    
    Route::controller(RackController::class)->group(function () {
        Route::get('warehouse/{warehouse}/racks', 'warehouse_rack_index')->name('warehouse.racks.index');
    });

    Route::controller(SupplierController::class)->group(function () {
        Route::get('warehouse/{warehouse}/suppliers', 'warehouse_supplier_index')->name('warehouse.suppliers.index');
    });

    Route::controller(CustomerController::class)->group(function () {
        Route::get('warehouse/{warehouse}/customers', 'warehouse_customer_index')->name('warehouse.customers.index');
    });
});