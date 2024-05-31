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
    Route::get('listTransactionsPaymentTable', 'transaction_payment');
    Route::get('listTransactionsPendingTable', 'transaction_pending');
    Route::get('listTransactionsConfirmedTable', 'transaction_confirmed');
    Route::get('listTransactionsDeclinedTable', 'transaction_declined');
    Route::get('listPurchasesPendingTable', 'purchases_pending');
    Route::get('listPurchasesConfirmedTable', 'purchases_confirmed');
    Route::get('listPurchasesDeclinedTable', 'purchases_declined');
    Route::get('listDailySalesReportTable', 'admin_daily_sales_report');
    Route::get('listMonthlySalesReportTable', 'admin_monthly_sales_report');
    Route::get('listYearlySalesReportTable', 'admin_yearly_sales_report');
    Route::get('listBillsHistoryTable', 'bills_history');
    Route::get('listWarehouseProductsTable/{warehouse}', 'warehouse_product');
    Route::get('listWarehouseProductCategoriesTable/{warehouse}', 'warehouse_product_category');
    Route::get('listWarehouseRacksTable/{warehouse}', 'warehouse_rack');
    Route::get('listWarehouseSuppliersTable/{warehouse}', 'warehouse_supplier');
    Route::get('listWarehouseCustomersTable/{warehouse}', 'warehouse_customer');
    Route::get('listWarehouseInboundsTable/{warehouse}', 'warehouse_inbound');
    Route::get('listWarehouseInventoriesTable/{warehouse}', 'warehouse_inventory');
    Route::get('listDetailSubscriptionsTable/{subscription}', 'admin_detail_subscription');
    Route::get('listTaxesReportTable', 'admin_taxes_report');
    Route::get('listDetailTaxesReportTable/{tax}', 'admin_detail_taxes_report');
    Route::get('listRentalActivityTable/{warehouse}', 'admin_rental_activity_warehouse');
    Route::get('listWarehouseOutboundsTable/{warehouse}', 'warehouse_outbound');
    Route::get('listWarehouseProductsOutboundTable/{warehouse}', 'warehouse_product_outbound');
    Route::get('listWarehouseCustomersOutboundTable/{warehouse}', 'warehouse_customer_outbound');
    Route::get('listDailySalesReportTenantTable/{warehouse}', 'tenant_sales_report_daily');
    Route::get('listMonthlySalesReportTenantTable/{warehouse}', 'tenant_sales_report_monthly');
    Route::get('listYearlySalesReportTenantTable/{warehouse}', 'tenant_sales_report_yearly');
    Route::get('listProductPerformanceTenantTable/{warehouse}', 'tenant_product_performance');
    Route::get('listSupplierPerformanceTenantTable/{warehouse}', 'tenant_supplier_performance');
    Route::get('listCustomerPerformanceTenantTable/{warehouse}', 'tenant_customer_performance');
    Route::get('listRentHistoryTenantTable/{warehouse}', 'tenant_rent_history');
    Route::get('listSupplierPerformanceWarehouseTable/{warehouse}', 'warehouse_supplier_performance');
    Route::get('listProductPerformanceWarehouseTable/{warehouse}', 'warehouse_product_performance');
    Route::get('listCustomerPerformanceWarehouseTable/{warehouse}', 'warehouse_customer_performance');
    Route::get('listDailySalesReportWarehouseTable/{warehouse}', 'warehouse_sales_report_daily');
    Route::get('listMonthlySalesReportWarehouseTable/{warehouse}', 'warehouse_sales_report_monthly');
    Route::get('listYearlySalesReportWarehouseTable/{warehouse}', 'warehouse_sales_report_yearly');
    Route::get('listProductPerformanceReportTable/{product}', 'warehouse_detail_product_performance');
    Route::get('listSupplierPerformanceReportTable/{supplier}', 'warehouse_detail_supplier_performance');
    Route::get('listCustomerPerformanceReportTable/{customer}', 'warehouse_detail_customer_performance');
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
    Route::get('ajax/bank-account/{bank}/edit', 'bank_account_edit');
    Route::get('ajax/warehouse/show', 'warehouse_show');
    Route::get('ajax/warehouse_subscription/{warehouse_subscription}/edit', 'warehouse_subscription_store_edit');
    Route::get('ajax/tenant-details/shopping-cart-count', 'tenant_shopping_cart_count');
    Route::get('ajax/tenant-details/new-payment-count', 'tenant_new_payment_count');
    Route::get('ajax/admin-details/new-purchase-count', 'admin_new_purchase_count');
    Route::get('ajax/shopping-cart/{temp_transaction}/delete', 'tenant_shopping_cart_destroy');
    Route::post('ajax/shopping-cart/{temp_transaction}/update-subscription', 'tenant_shopping_cart_update_subscription');
    Route::post('ajax/deactivate-account', 'deactivate_account');
    Route::get('ajax/product-category/{category}/edit', 'product_category_edit');
    Route::get('ajax/rack/{rack}/edit', 'rack_edit');
    Route::get('ajax/supplier/{supplier}/edit', 'supplier_edit');
    Route::get('ajax/tax/{tax}/show', 'tax_show');
    Route::get('/ajax/customer-outbound/{warehouse}/create', 'customer_outbound_create');
    Route::post('/ajax/product-outbound/{warehouse}/store/{product}', 'product_outbound_store');
    Route::post('/ajax/product-outbound/{warehouse}/store', 'products_outbound_store');
    Route::post('/ajax/product-quantity-outbound/{temp_outbound}/edit', 'product_quantity_outbound_edit');
    Route::post('/ajax/product-outbound/{temp_outbound}/delete', 'product_outbound_destroy');
    Route::post('/ajax/temp-outbound/{temp_outbound}/delete', 'temp_outbounds_destroy');
    Route::get('/ajax/inbound/{inbound}/edit', 'inbound_edit');
    Route::post('/ajax/inbound/code-check', 'inbound_code_check');
    Route::get('/ajax/warehouse-product-performance/{product}/detail', 'warehouse_product_performance_detail');
    Route::get('/ajax/warehouse-supplier-performance/{supplier}/detail', 'warehouse_supplier_performance_detail');
    Route::get('/ajax/warehouse-customer-performance/{customer}/detail', 'warehouse_customer_performance_detail');
    Route::get('/ajax/tenant-product-performance/{product}/detail', 'tenant_product_performance_detail');
    Route::get('/ajax/tenant-supplier-performance/{supplier}/detail', 'tenant_supplier_performance_detail');
    Route::get('/ajax/tenant-customer-performance/{customer}/detail', 'tenant_customer_performance_detail');
});