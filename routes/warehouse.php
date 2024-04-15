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
        Route::get('warehouse/{warehouse}/products/add', 'warehouse_product_create');
        Route::post('warehouse/{warehouse}/products', 'warehouse_product_store')->name('warehouse.products.store');
        Route::get('warehouse/{warehouse}/products/{product}', 'warehouse_product_edit')->name('warehouse.products.edit');
        Route::patch('warehouse/{warehouse}/products/{product}', 'warehouse_product_update')->name('warehouse.products.update');
        Route::get('warehouse/{warehouse}/products/{product}/show', 'warehouse_product_show')->name('warehouse.products.show');
        Route::delete('warehouse/{warehouse}/products/{product}', 'warehouse_product_delete')->name('warehouse.products.destroy');
    });

    Route::controller(ProductCategoryController::class)->group(function () {
        Route::get('warehouse/{warehouse}/categories', 'warehouse_category_index')->name('warehouse.product.categories.index');
        Route::post('warehouse/{warehouse}/categories', 'warehouse_category_store')->name('warehouse.product.categories.store');
        Route::patch('warehouse/categories/{category}', 'warehouse_category_update')->name('warehouse.product.categories.update');
        Route::get('warehouse/{warehouse}/categories/{category}', 'warehouse_category_show')->name('warehouse.product.categories.show');
        Route::delete('warehouse/{warehouse}/categories/{category}', 'warehouse_category_delete')->name('warehouse.product.categories.destroy');
    });
    
    Route::controller(RackController::class)->group(function () {
        Route::get('warehouse/{warehouse}/racks', 'warehouse_rack_index')->name('warehouse.racks.index');
        Route::post('warehouse/{warehouse}/racks', 'warehouse_rack_store')->name('warehouse.racks.store');
        Route::patch('warehouse/racks/{rack}', 'warehouse_rack_update')->name('warehouse.rack.update');
        Route::get('warehouse/{warehouse}/racks/{rack}', 'warehouse_rack_show')->name('warehouse.rack.show');
        Route::delete('warehouse/{warehouse}/racks/{rack}', 'warehouse_rack_delete')->name('warehouse.rack.destroy');
    });

    Route::controller(SupplierController::class)->group(function () {
        Route::get('warehouse/{warehouse}/suppliers', 'warehouse_supplier_index')->name('warehouse.suppliers.index');
        Route::post('warehouse/{warehouse}/suppliers', 'warehouse_supplier_store')->name('warehouse.suppliers.store');
        Route::patch('warehouse/suppliers/{supplier}', 'warehouse_supplier_update')->name('warehouse.suppliers.update');
        Route::get('warehouse/{warehouse}/suppliers/{supplier}/show', 'warehouse_supplier_show')->name('warehouse.suppliers.show');
        Route::delete('warehouse/{warehouse}/suppliers/{supplier}', 'warehouse_supplier_delete')->name('warehouse.suppliers.destroy');
    });

    Route::controller(CustomerController::class)->group(function () {
        Route::get('warehouse/{warehouse}/customers', 'warehouse_customer_index')->name('warehouse.customers.index');
    });
});