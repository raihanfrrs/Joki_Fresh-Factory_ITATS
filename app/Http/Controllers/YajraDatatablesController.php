<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Repositories\UserRepository;
use App\Repositories\TenantRepository;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\WarehouseRepository;
use App\Repositories\SubscriptionRepository;
use App\Repositories\WarehouseCategoryRepository;
use App\Repositories\WarehouseSubscriptionRepository;

class YajraDatatablesController extends Controller
{
    protected $userRepository, $tenantRepository, $warehouseCategoryRepository, $warehouseRepository, $subscriptionRepository, $warehouseSubscriptionRepository;

    public function __construct(UserRepository $userRepository, TenantRepository $tenantRepository, WarehouseCategoryRepository $warehouseCategoryRepository, WarehouseRepository $warehouseRepository, SubscriptionRepository $subscriptionRepository, WarehouseSubscriptionRepository $warehouseSubscriptionRepository)
    {
        $this->userRepository = $userRepository;
        $this->tenantRepository = $tenantRepository;
        $this->warehouseCategoryRepository = $warehouseCategoryRepository;
        $this->warehouseRepository = $warehouseRepository;
        $this->subscriptionRepository = $subscriptionRepository;
        $this->warehouseSubscriptionRepository = $warehouseSubscriptionRepository;
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
        ->addColumn('facility', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.facility-column', compact('model'))->render();
        })
        ->addColumn('rental_price', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.rental-price-column', compact('model'))->render();
        })
        ->addColumn('surface_area', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.surface-area-column', compact('model'))->render();
        })
        ->addColumn('building_area', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.building-area-column', compact('model'))->render();
        })
        ->addColumn('city', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.city-column', compact('model'))->render();
        })
        ->addColumn('address', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.address-column', compact('model'))->render();
        })
        ->addColumn('description', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.description-column', compact('model'))->render();
        })
        ->addColumn('payment_time', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-warehouse.payment-time-column', compact('model'))->render();
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
        ->rawColumns(['name', 'category', 'capacity', 'facility', 'rental_price', 'surface_area', 'building_area','city', 'address', 'description', 'payment_time', 'admin', 'status', 'created_at', 'action'])
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
}
