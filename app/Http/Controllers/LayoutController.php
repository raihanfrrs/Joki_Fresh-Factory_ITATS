<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\RackRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\RentedRepository;
use App\Repositories\TenantRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\WarehouseRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\DetailTransactionRepository;

class LayoutController extends Controller
{
    protected $warehouseRepository, $transactionRepository, $userRepository, $rentedRepository, $customerRepository, $detailTransactionRepository, $tenantRepository, $productRepository, $rackRepository, $productCategoryRepository, $supplierRepository;

    public function __construct(WarehouseRepository $warehouseRepository, TransactionRepository $transactionRepository, UserRepository $userRepository, RentedRepository $rentedRepository, CustomerRepository $customerRepository, DetailTransactionRepository $detailTransactionRepository, TenantRepository $tenantRepository, ProductRepository $productRepository, RackRepository $rackRepository, ProductCategoryRepository $productCategoryRepository, SupplierRepository $supplierRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
        $this->transactionRepository = $transactionRepository;
        $this->userRepository = $userRepository;
        $this->rentedRepository = $rentedRepository;
        $this->customerRepository = $customerRepository;
        $this->detailTransactionRepository = $detailTransactionRepository;
        $this->tenantRepository = $tenantRepository;
        $this->productRepository = $productRepository;
        $this->rackRepository = $rackRepository;
        $this->productCategoryRepository = $productCategoryRepository;
        $this->supplierRepository = $supplierRepository;
    }

    public function index()
    {
        if (Auth::check()) {
            $this->rentedRepository->deleteRentWhenExpiredToday();
        }

        if (Auth::check() && auth()->user()->level == 'tenant') {
            return view('pages.tenant.dashboard.index');
        } elseif (Auth::check() && auth()->user()->level == 'admin') {
            return view('pages.admin.dashboard.index', [
                'transactions_year' => $this->transactionRepository->getAllTransactionsGroupByPeriodically('year'),
                'transactions_month' => $this->transactionRepository->getAllTransactionsGroupByPeriodically('month'),
                'tenants' => $this->userRepository->getAllUserTenant()->where('created_at', Carbon::now()->month)->where('created_at', Carbon::now()->year)->count(),
                'orders' => $this->transactionRepository->getAllTransactionsGroupByPeriodically('month'),
                'customers' => $this->customerRepository->getAllCustomers()->where('created_at', Carbon::now()->month)->where('created_at', Carbon::now()->year)->count(),
                'tenant_growth_percentage' => $this->userRepository->getTenantGrowthPercentage(),
                'tenant_overview_statistics' => $this->userRepository->getTenantTransactionStatistics(),
                'revenue_growth_weekly_transaction_report' => $this->transactionRepository->getWeeklyReportTransactionIncome(),
                'revenue_growth_weekly_transaction_report_percentage' => $this->transactionRepository->getWeeklyReportTransactionIncomePercentage(),
                'total_rented_warehouse' => $this->detailTransactionRepository->getAllDetailTransactionWithTransactionStatus('confirmed')->count(),
                'total_warehouse_units' => $this->warehouseRepository->getAllWarehouses()->count(),
                'total_all_of_time_transactions_income' => $this->transactionRepository->getAllOfTimeTransactionsIncome('confirmed'),
                'warehouse_active_percentage' => $this->warehouseRepository->calculateWarehouseAvailablePercentage(),
                'total_all_of_time_tenants_spend' => $this->tenantRepository->getAllOfTimeTransactions('confirmed'),
                'total_all_of_time_tenants_order' => $this->tenantRepository->getAllOfTimeOrders('confirmed'),
                'total_all_of_time_tenants_rent' => $this->tenantRepository->getAllOfTimeRents('confirmed'),
                'total_all_of_time_tenants_items' => $this->productRepository->getAllOfTimeRents()->count(),
                'total_all_of_time_product_items' => $this->productRepository->getAllProducts()->count(),
                'total_all_of_time_product_racks' => $this->rackRepository->getAllRacks()->count(),
                'total_all_of_time_product_categories' => $this->productCategoryRepository->getAllProductCategories()->count(),
                'total_all_of_time_product_supplier' => $this->supplierRepository->getAllSupplierWithJoinProduct()->count()
            ]);
        } else {
            return view('pages.guest.dashboard.index', [
                'transactions' => $this->transactionRepository->getTransactionByStatus('confirmed')->count(),
                'warehouses' => $this->warehouseRepository->getAllWarehouses()->count(),
                'users' => $this->userRepository->getAllUserTenant()->count(),
            ]);
        }
    }
}
