<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Tenant;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\WarehouseCategory;
use App\Repositories\AdminRepository;
use App\Repositories\TenantRepository;
use App\Repositories\WarehouseCategoryRepository;

class AjaxController extends Controller
{
    private $adminRepository, $tenantRepository, $warehouseCategoryRepository;

    public function __construct(AdminRepository $adminRepository, TenantRepository $tenantRepository, WarehouseCategoryRepository $warehouseCategoryRepository) {
        $this->adminRepository = $adminRepository;
        $this->tenantRepository = $tenantRepository;
        $this->warehouseCategoryRepository = $warehouseCategoryRepository;
    }

    public function admin_detail_show($admin, $type)
    {
        if ($type == 'account') {
            return view('components.data-ajax.pages.data-admin-detail.account');
        } elseif ($type == 'security') {
            return view('components.data-ajax.pages.data-admin-detail.security');
        }
    }

    public function tenant_detail_show($tenant, $type)
    {
        if ($type == 'account') {
            return view('components.data-ajax.pages.data-tenant-detail.account');
        } elseif ($type == 'security') {
            return view('components.data-ajax.pages.data-tenant-detail.security');
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

    public function warehouse_edit(Warehouse $warehouse)
    {
        return view('components.data-ajax.pages.modal.data-edit-warehouse-modal', [
            'warehouse' => $warehouse,
            'categories' => $this->warehouseCategoryRepository->getAllWarehouseCategories()
        ]);
    }

    public function warehouse_category_edit(WarehouseCategory $warehouse_category)
    {
        return view('components.data-ajax.pages.modal.data-edit-warehouse-category-modal', compact('warehouse_category'));
    }
}