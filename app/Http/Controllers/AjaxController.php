<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use App\Models\User;
use App\Models\Admin;
use App\Models\Tenant;
use App\Models\Warehouse;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\TempTransaction;
use App\Models\WarehouseCategory;
use App\Models\WarehouseSubscription;
use App\Repositories\AdminRepository;
use App\Repositories\TenantRepository;
use App\Repositories\WarehouseRepository;
use App\Repositories\TempTransactionRepository;
use App\Repositories\WarehouseCategoryRepository;
use App\Repositories\WarehouseSubscriptionCartRepository;

class AjaxController extends Controller
{
    private $adminRepository, $tenantRepository, $warehouseCategoryRepository, $warehouseRepository, $warehouseSubscriptionCartRepository, $tempTransactionRepository;

    public function __construct(AdminRepository $adminRepository, TenantRepository $tenantRepository, WarehouseCategoryRepository $warehouseCategoryRepository, WarehouseRepository $warehouseRepository, WarehouseSubscriptionCartRepository $warehouseSubscriptionCartRepository, TempTransactionRepository $tempTransactionRepository) {
        $this->adminRepository = $adminRepository;
        $this->tenantRepository = $tenantRepository;
        $this->warehouseCategoryRepository = $warehouseCategoryRepository;
        $this->warehouseRepository = $warehouseRepository;
        $this->warehouseSubscriptionCartRepository = $warehouseSubscriptionCartRepository;
        $this->tempTransactionRepository = $tempTransactionRepository;
    }

    public function admin_detail_show($admin, $type)
    {
        if ($type == 'account') {
            return view('components.data-ajax.pages.data-admin-detail.account', [
                'admin' => $this->adminRepository->getAdmin($admin)
            ]);
        } elseif ($type == 'security') {
            return view('components.data-ajax.pages.data-admin-detail.security', [
                'admin' => $this->adminRepository->getAdmin($admin)
            ]);
        }
    }

    public function tenant_detail_show($tenant, $type)
    {
        if ($type == 'account') {
            return view('components.data-ajax.pages.data-tenant-detail.account', [
                'tenant' => $this->tenantRepository->getTenant($tenant)
            ]);
        } elseif ($type == 'security') {
            return view('components.data-ajax.pages.data-tenant-detail.security', [
                'tenant' => $this->tenantRepository->getTenant($tenant)
            ]);
        }
    }

    public function warehouse_detail_show($warehouse, $type)
    {
        if ($type == 'information') {
            return view('components.data-ajax.pages.data-warehouse-detail.information');
        } elseif ($type == 'activity') {
            return view('components.data-ajax.pages.data-warehouse-detail.activity');
        }
    }

    public function admin_edit(User $user)
    {
        $admin = $user->admin;
        return view('components.data-ajax.pages.modal.data-edit-admin-modal', compact('admin'));
    }

    public function tenant_edit(Tenant $tenant)
    {
        return view('components.data-ajax.pages.modal.data-edit-tenant-modal', compact('tenant'));
    }

    public function warehouse_category_edit(WarehouseCategory $warehouse_category)
    {
        return view('components.data-ajax.pages.modal.data-edit-warehouse-category-modal', compact('warehouse_category'));
    }

    public function tax_edit(Tax $tax)
    {
        return view('components.data-ajax.pages.modal.data-edit-tax-modal', compact('tax'));
    }

    public function subscription_edit(Subscription $subscription)
    {
        return view('components.data-ajax.pages.modal.data-edit-subscription-modal', compact('subscription'));
    }

    public function warehouse_show()
    {
        return view('components.data-ajax.pages.modal.data-warehouse-show-modal', [
            'warehouses' => $this->warehouseRepository->getAllWarehouses()
        ]);
    }

    public function warehouse_subscription_store_edit(WarehouseSubscription $warehouse_subscription)
    {
        return $this->warehouseSubscriptionCartRepository->storeWarehouseSubscriptionCart(['warehouse_id' => $warehouse_subscription->warehouse_id, 'subscription_id' => $warehouse_subscription->subscription_id, 'price_rate' => $warehouse_subscription->price_rate, 'total_price' => $warehouse_subscription->total_price]);
    }

    public function tenant_shopping_cart_count()
    {
        return $this->tempTransactionRepository->getTempTransactionByTenantId()->count();
    }

    public function tenant_shopping_cart_destroy(TempTransaction $temp_transaction)
    {
        if($this->tempTransactionRepository->destroyTempTransaction($temp_transaction->id)) {
            return true;
        }
    }

    public function tenant_shopping_cart_update_subscription(Request $request, TempTransaction $temp_transaction)
    {
        if($this->tempTransactionRepository->updateTempTransaction($request, $temp_transaction->id)) {
            return true;
        }
    }
}