<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Repositories\TaxRepository;
use App\Repositories\UserRepository;
use App\Repositories\TenantRepository;
use App\Repositories\BillingRepository;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\WarehouseRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\SubscriptionRepository;
use App\Repositories\WarehouseCategoryRepository;
use App\Repositories\WarehouseSubscriptionRepository;

class YajraDatatablesController extends Controller
{
    protected $userRepository, $tenantRepository, $warehouseCategoryRepository, $warehouseRepository, $subscriptionRepository, $warehouseSubscriptionRepository, $taxRepository, $transactionRepository, $billingRepository;

    public function __construct(UserRepository $userRepository, TenantRepository $tenantRepository, WarehouseCategoryRepository $warehouseCategoryRepository, WarehouseRepository $warehouseRepository, SubscriptionRepository $subscriptionRepository, WarehouseSubscriptionRepository $warehouseSubscriptionRepository, TaxRepository $taxRepository, TransactionRepository $transactionRepository, BillingRepository $billingRepository)
    {
        $this->userRepository = $userRepository;
        $this->tenantRepository = $tenantRepository;
        $this->warehouseCategoryRepository = $warehouseCategoryRepository;
        $this->warehouseRepository = $warehouseRepository;
        $this->subscriptionRepository = $subscriptionRepository;
        $this->warehouseSubscriptionRepository = $warehouseSubscriptionRepository;
        $this->taxRepository = $taxRepository;
        $this->transactionRepository = $transactionRepository;
        $this->billingRepository = $billingRepository;
    }

    public function admin_index()
    {
        $users = $this->userRepository->getUserExceptMeAndCore(auth()->user()->id);

        return DataTables::of($users)
        ->addColumn('index', function ($model) use ($users) {
            return $users->search($model) + 1;
        })
        ->addColumn('name', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.name-column', compact('model'))->render();
        })
        ->addColumn('email', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.email-column', compact('model'))->render();
        })
        ->addColumn('phone', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.phone-column', compact('model'))->render();
        })
        ->addColumn('pob_dob', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.pob-dob-column', compact('model'))->render();
        })
        ->addColumn('gender', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.gender-column', compact('model'))->render();
        })
        ->addColumn('address', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.address-column', compact('model'))->render();
        })
        ->addColumn('created_at', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.created-at-column', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.status-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.action-column', compact('model'))->render();
        })
        ->rawColumns(['name', 'email', 'phone', 'pob_dob', 'gender', 'address', 'created_at', 'status', 'action'])
        ->make(true);
    }

    public function tenant_index()
    {
        $tenants = $this->tenantRepository->getAllTenants();

        return DataTables::of($tenants)
        ->addColumn('index', function ($model) use ($tenants) {
            return $tenants->search($model) + 1;
        })
        ->addColumn('name', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.name-column', compact('model'))->render();
        })
        ->addColumn('identity_number', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.identity-number-column', compact('model'))->render();
        })
        ->addColumn('email', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.email-column', compact('model'))->render();
        })
        ->addColumn('phone', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.phone-column', compact('model'))->render();
        })
        ->addColumn('pob_dob', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.pob-dob-column', compact('model'))->render();
        })
        ->addColumn('gender', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.gender-column', compact('model'))->render();
        })
        ->addColumn('address', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.address-column', compact('model'))->render();
        })
        ->addColumn('created_at', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.created-at-column', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.status-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.action-column', compact('model'))->render();
        })
        ->rawColumns(['name', 'identity_number', 'email', 'phone', 'pob_dob', 'gender', 'address', 'created_at', 'status', 'action'])
        ->make(true);
    }

    public function warehouse_index($type)
    {
        $warehouses = $this->warehouseRepository->getAllWarehouses();

        return DataTables::of($warehouses)
        ->addColumn('index', function ($model) use ($warehouses) {
            return $warehouses->search($model) + 1;
        })
        ->addColumn('name', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.name-column', compact('model'))->render();
        })
        ->addColumn('category', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.category-column', compact('model'))->render();
        })
        ->addColumn('capacity', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.capacity-column', compact('model'))->render();
        })
        ->addColumn('surface_area', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.surface-area-column', compact('model'))->render();
        })
        ->addColumn('building_area', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.building-area-column', compact('model'))->render();
        })
        ->addColumn('country', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.country-column', compact('model'))->render();
        })
        ->addColumn('zip_code', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.zip-code-column', compact('model'))->render();
        })
        ->addColumn('city', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.city-column', compact('model'))->render();
        })
        ->addColumn('address', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.address-column', compact('model'))->render();
        })
        ->addColumn('storage_shelves', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.storage-shelves-column', compact('model'))->render();
        })
        ->addColumn('goods_handling_equipment', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.goods-handling-equipment-column', compact('model'))->render();
        })
        ->addColumn('effective_lighting_system', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.effective-lighting-system-column', compact('model'))->render();
        })
        ->addColumn('advanced_security_system', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.advanced-security-system-column', compact('model'))->render();
        })
        ->addColumn('toilet_and_rest_area', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.toilet-and-rest-area-column', compact('model'))->render();
        })
        ->addColumn('electricity', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.electricity-column', compact('model'))->render();
        })
        ->addColumn('administrative_room_or_office', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.administrative-room-or-office-column', compact('model'))->render();
        })
        ->addColumn('worker_safety_equipment', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.worker-safety-equipment-column', compact('model'))->render();
        })
        ->addColumn('firefighting_tools', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.firefighting-tools-column', compact('model'))->render();
        })
        ->addColumn('description', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.description-column', compact('model'))->render();
        })
        ->addColumn('admin', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.admin-column', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.status-column', compact('model'))->render();
        })
        ->addColumn('created_at', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.created-at-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) use ($type) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.action-column', [
                'model' => $model,
                'type' => $type
            ])->render();
        })
        ->rawColumns(['name', 'category', 'capacity', 'surface_area', 'building_area', 'country', 'zip_code', 'city', 'address', 'storage_shelves', 'effective_lighting_system', 'goods_handling_equipment', 'advanced_security_system', 'toilet_and_rest_area', 'electricity', 'administrative_room_or_office', 'worker_safety_equipment', 'firefighting_tools', 'description', 'admin', 'status', 'created_at', 'action'])
        ->make(true);
    }

    public function category_index()
    {
        $categories = $this->warehouseCategoryRepository->getAllWarehouseCategories();

        return DataTables::of($categories)
        ->addColumn('index', function ($model) use ($categories) {
            return $categories->search($model) + 1;
        })
        ->addColumn('category', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-category.category-column', compact('model'))->render();
        })
        ->addColumn('total_warehouse', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-category.total-warehouse-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-category.action-column', compact('model'))->render();
        })
        ->rawColumns(['category', 'total_warehouses', 'action'])
        ->make(true);
    }

    public function subscription_index()
    {
        $subscriptions = $this->subscriptionRepository->getAllSubscriptions();

        return DataTables::of($subscriptions)
        ->addColumn('index', function ($model) use ($subscriptions) {
            return $subscriptions->search($model) + 1;
        })
        ->addColumn('name', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-subscription.name-column', compact('model'))->render();
        })
        ->addColumn('month_duration', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-subscription.month-duration-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-subscription.action-column', compact('model'))->render();
        })
        ->rawColumns(['name', 'month_duration', 'action'])
        ->make(true);
    }

    public function taxes_index()
    {
        $taxes = $this->taxRepository->getAllTaxes();

        return DataTables::of($taxes)
        ->addColumn('index', function ($model) use ($taxes) {
            return $taxes->search($model) + 1;
        })
        ->addColumn('value', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tax.value-column', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tax.status-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tax.action-column', compact('model'))->render();
        })
        ->rawColumns(['value', 'status', 'action'])
        ->make(true);
    }

    public function rental_price_calculation_index()
    {
        $warehouseSubscription = $this->warehouseSubscriptionRepository->getAllWarehouseSubscriptions();
        $warehouseSubscription = $warehouseSubscription->get();

        return DataTables::of($warehouseSubscription)
        ->addColumn('index', function ($model) use ($warehouseSubscription) {
            return $warehouseSubscription->search($model) + 1;
        })
        ->addColumn('warehouse_name', function ($model) {
            return view('components.data-ajax.yajra-column.data-rental-price-calculation.warehouse-name-column', compact('model'))->render();
        })
        ->addColumn('subscription_name', function ($model) {
            return view('components.data-ajax.yajra-column.data-rental-price-calculation.subscription-name-column', compact('model'))->render();
        })
        ->addColumn('month_duration', function ($model) {
            return view('components.data-ajax.yajra-column.data-rental-price-calculation.month-duration-column', compact('model'))->render();
        })
        ->addColumn('price_rate', function ($model) {
            return view('components.data-ajax.yajra-column.data-rental-price-calculation.price-rate-column', compact('model'))->render();
        })
        ->addColumn('total_price', function ($model) {
            return view('components.data-ajax.yajra-column.data-rental-price-calculation.total-price-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-rental-price-calculation.action-column', compact('model'))->render();
        })
        ->rawColumns(['warehouse_name', 'subscription_name', 'month_duration', 'price_rate', 'total_price', 'action'])
        ->make(true);
    }

    public function warehouse_subscription_index($warehouse)
    {
        $warehouseSubscription = $this->warehouseSubscriptionRepository->getWarehouseSubscriptionByWarehouseId($warehouse);

        return DataTables::of($warehouseSubscription)
        ->addColumn('index', function ($model) use ($warehouseSubscription) {
            return $warehouseSubscription->search($model) + 1;
        })
        ->addColumn('warehouse_name', function ($model) {
            return view('components.data-ajax.yajra-column.data-rental-price-calculation.warehouse-name-column', compact('model'))->render();
        })
        ->addColumn('subscription_name', function ($model) {
            return view('components.data-ajax.yajra-column.data-rental-price-calculation.subscription-name-column', compact('model'))->render();
        })
        ->addColumn('month_duration', function ($model) {
            return view('components.data-ajax.yajra-column.data-rental-price-calculation.month-duration-column', compact('model'))->render();
        })
        ->addColumn('price_rate', function ($model) {
            return view('components.data-ajax.yajra-column.data-rental-price-calculation.price-rate-column', compact('model'))->render();
        })
        ->addColumn('total_price', function ($model) {
            return view('components.data-ajax.yajra-column.data-rental-price-calculation.total-price-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-rental-price-calculation.action-column', compact('model'))->render();
        })
        ->rawColumns(['warehouse_name', 'subscription_name', 'month_duration', 'price_rate', 'total_price', 'action'])
        ->make(true);
    }

    public function transaction_payment()
    {
        $transactions = $this->transactionRepository->getTransactionByStatus('payment');

        return DataTables::of($transactions)
        ->addColumn('index', function ($model) use ($transactions) {
            return $transactions->search($model) + 1;
        })
        ->addColumn('payment_id', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-payment.payment-id-column', compact('model'))->render();
        })
        ->addColumn('date', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-payment.date-column', compact('model'))->render();
        })
        ->addColumn('amount', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-payment.amount-column', compact('model'))->render();
        })
        ->addColumn('total_payment', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-payment.total-payment-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-payment.action-column', compact('model'))->render();
        })
        ->rawColumns(['payment_id', 'date', 'amount', 'total_payment', 'action'])
        ->make(true);
    }

    public function transaction_pending()
    {
        $transactions = $this->transactionRepository->getTransactionByStatus('success');

        return DataTables::of($transactions)
        ->addColumn('index', function ($model) use ($transactions) {
            return $transactions->search($model) + 1;
        })
        ->addColumn('payment_id', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-pending.payment-id-column', compact('model'))->render();
        })
        ->addColumn('date', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-pending.date-column', compact('model'))->render();
        })
        ->addColumn('amount', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-pending.amount-column', compact('model'))->render();
        })
        ->addColumn('total_payment', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-pending.total-payment-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-pending.action-column', compact('model'))->render();
        })
        ->rawColumns(['payment_id', 'date', 'amount', 'total_payment', 'action'])
        ->make(true);
    }

    public function transaction_confirmed()
    {
        $transactions = $this->transactionRepository->getTransactionByStatus('confirmed');

        return DataTables::of($transactions)
        ->addColumn('index', function ($model) use ($transactions) {
            return $transactions->search($model) + 1;
        })
        ->addColumn('payment_id', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-confirmed.payment-id-column', compact('model'))->render();
        })
        ->addColumn('date', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-confirmed.date-column', compact('model'))->render();
        })
        ->addColumn('amount', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-confirmed.amount-column', compact('model'))->render();
        })
        ->addColumn('total_payment', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-confirmed.total-payment-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-confirmed.action-column', compact('model'))->render();
        })
        ->rawColumns(['payment_id', 'date', 'amount', 'total_payment', 'action'])
        ->make(true);
    }

    public function transaction_declined()
    {
        $transactions = $this->transactionRepository->getTransactionByStatus('declined');

        return DataTables::of($transactions)
        ->addColumn('index', function ($model) use ($transactions) {
            return $transactions->search($model) + 1;
        })
        ->addColumn('payment_id', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-declined.payment-id-column', compact('model'))->render();
        })
        ->addColumn('date', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-declined.date-column', compact('model'))->render();
        })
        ->addColumn('amount', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-declined.amount-column', compact('model'))->render();
        })
        ->addColumn('total_payment', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-declined.total-payment-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-transaction-declined.action-column', compact('model'))->render();
        })
        ->rawColumns(['payment_id', 'date', 'amount', 'total_payment', 'action'])
        ->make(true);
    }

    public function purchases_pending()
    {
        $transactions = $this->transactionRepository->getTransactionByStatus('success');

        return DataTables::of($transactions)
        ->addColumn('index', function ($model) use ($transactions) {
            return $transactions->search($model) + 1;
        })
        ->addColumn('payment_id', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-pending.payment-id-column', compact('model'))->render();
        })
        ->addColumn('name', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-pending.name-column', compact('model'))->render();
        })
        ->addColumn('date', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-pending.date-column', compact('model'))->render();
        })
        ->addColumn('amount', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-pending.amount-column', compact('model'))->render();
        })
        ->addColumn('total_payment', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-pending.total-payment-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-pending.action-column', compact('model'))->render();
        })
        ->rawColumns(['payment_id', 'name', 'date', 'amount', 'total_payment', 'action'])
        ->make(true);
    }

    public function purchases_confirmed()
    {
        $transactions = $this->transactionRepository->getTransactionByStatus('confirmed');

        return DataTables::of($transactions)
        ->addColumn('index', function ($model) use ($transactions) {
            return $transactions->search($model) + 1;
        })
        ->addColumn('payment_id', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-confirmed.payment-id-column', compact('model'))->render();
        })
        ->addColumn('name', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-confirmed.name-column', compact('model'))->render();
        })
        ->addColumn('date', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-confirmed.date-column', compact('model'))->render();
        })
        ->addColumn('amount', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-confirmed.amount-column', compact('model'))->render();
        })
        ->addColumn('total_payment', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-confirmed.total-payment-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-confirmed.action-column', compact('model'))->render();
        })
        ->rawColumns(['payment_id', 'name', 'date', 'amount', 'total_payment', 'action'])
        ->make(true);
    }

    public function purchases_declined()
    {
        $transactions = $this->transactionRepository->getTransactionByStatus('declined');

        return DataTables::of($transactions)
        ->addColumn('index', function ($model) use ($transactions) {
            return $transactions->search($model) + 1;
        })
        ->addColumn('payment_id', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-declined.payment-id-column', compact('model'))->render();
        })
        ->addColumn('name', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-declined.name-column', compact('model'))->render();
        })
        ->addColumn('date', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-declined.date-column', compact('model'))->render();
        })
        ->addColumn('amount', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-declined.amount-column', compact('model'))->render();
        })
        ->addColumn('total_payment', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-declined.total-payment-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-purchase-declined.action-column', compact('model'))->render();
        })
        ->rawColumns(['payment_id', 'name', 'date', 'amount', 'total_payment', 'action'])
        ->make(true);
    }

    public function admin_daily_sales_report()
    {
        $transactions = $this->transactionRepository->getAllTransactionsGroupByPeriodically('day');

        return DataTables::of($transactions)
        ->addColumn('index', function ($model) use ($transactions) {
            return $transactions->search($model) + 1;
        })
        ->addColumn('created_at', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-daily-sales-report.created-at-column', compact('model'))->render();
        })
        ->addColumn('amount', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-daily-sales-report.amount-column', compact('model'))->render();
        })
        ->addColumn('grand_total', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-daily-sales-report.grand-total-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-daily-sales-report.action-column', compact('model'))->render();
        })
        ->rawColumns(['created_at', 'amount', 'grand_total', 'action'])
        ->make(true);
    }

    public function admin_monthly_sales_report()
    {
        $transactions = $this->transactionRepository->getAllTransactionsGroupByPeriodically('month');

        return DataTables::of($transactions)
        ->addColumn('index', function ($model) use ($transactions) {
            return $transactions->search($model) + 1;
        })
        ->addColumn('created_at', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-monthly-sales-report.created-at-column', compact('model'))->render();
        })
        ->addColumn('amount', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-monthly-sales-report.amount-column', compact('model'))->render();
        })
        ->addColumn('grand_total', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-monthly-sales-report.grand-total-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-monthly-sales-report.action-column', compact('model'))->render();
        })
        ->rawColumns(['created_at', 'amount', 'grand_total', 'action'])
        ->make(true);
    }

    public function admin_yearly_sales_report()
    {
        $transactions = $this->transactionRepository->getAllTransactionsGroupByPeriodically('year');

        return DataTables::of($transactions)
        ->addColumn('index', function ($model) use ($transactions) {
            return $transactions->search($model) + 1;
        })
        ->addColumn('created_at', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-yearly-sales-report.created-at-column', compact('model'))->render();
        })
        ->addColumn('amount', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-yearly-sales-report.amount-column', compact('model'))->render();
        })
        ->addColumn('grand_total', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-yearly-sales-report.grand-total-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-yearly-sales-report.action-column', compact('model'))->render();
        })
        ->rawColumns(['created_at', 'amount', 'grand_total', 'action'])
        ->make(true);
    }

    public function bills_history()
    {
        $transactions = $this->transactionRepository->getTransactionByStatus('confirmed');

        return DataTables::of($transactions)
        ->addColumn('index', function ($model) use ($transactions) {
            return $transactions->search($model) + 1;
        })
        ->addColumn('name', function ($model) {
            return view('components.data-ajax.yajra-column.data-bills-history.name-column', compact('model'))->render();
        })
        ->addColumn('bank', function ($model) {
            return view('components.data-ajax.yajra-column.data-bills-history.bank-column', compact('model'))->render();
        })
        ->addColumn('created_at', function ($model) {
            return view('components.data-ajax.yajra-column.data-bills-history.created-at-column', compact('model'))->render();
        })
        ->addColumn('grand_total', function ($model) {
            return view('components.data-ajax.yajra-column.data-bills-history.grand-total-column', compact('model'))->render();
        })
        ->rawColumns(['name', 'bank', 'created_at', 'grand_total'])
        ->make(true);
    }
}
