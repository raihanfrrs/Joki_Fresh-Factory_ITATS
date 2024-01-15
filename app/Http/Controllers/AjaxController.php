<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Tenant;
use App\Models\User;
use App\Models\WarehouseCategory;
use Illuminate\Http\Request;
use App\Repositories\AdminRepository;
use App\Repositories\TenantRepository;

class AjaxController extends Controller
{
    private $adminRepository;
    private $tenantRepository;

    public function __construct(AdminRepository $adminRepository, TenantRepository $tenantRepository) {
        $this->adminRepository = $adminRepository;
        $this->tenantRepository = $tenantRepository;
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
}