<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Requests\TenantUpdateRequest;
use App\Models\Tenant;
use App\Repositories\AdminRepository;
use App\Repositories\TenantRepository;
use App\Repositories\UserRepository;

class AdminMasterController extends Controller
{
    private $adminRepository, $userRepository, $tenantRepository;

    public function __construct(AdminRepository $adminRepository, UserRepository $userRepository, TenantRepository $tenantRepository) {
        $this->adminRepository = $adminRepository;
        $this->userRepository = $userRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function master_admin_index()
    {
        return view('pages.admin.master.users.admin.index');
    }

    public function master_admin_store(AdminRequest $adminRequest)
    {
        
        if (auth()->user()->attribute == 'none') {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'You are not allowed!'
            ]);
        }

        if ($adminRequest->validated()) {

            $data = $adminRequest->all();
            DB::transaction(function () use ($data, $adminRequest) {
                $data['level'] = 'admin';
                $user = $this->userRepository->createUser($data);
    
                $data['user_id'] = $user->id;
                $admins = $this->adminRepository->createAdmin($data);

                if ($adminRequest->hasFile('admin_image')) {
                    $admins->addMediaFromRequest('admin_image')->withResponsiveImages()->toMediaCollection('admin_images');
                }
            });

            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Admin has been created!'
            ]);
        }
    }

    public function master_admin_show(Admin $admin)
    {
        return view('pages.admin.master.users.admin.show', compact('admin'));
    }

    public function master_admin_destroy($admin)
    {
        if ($this->adminRepository->destroyAdmin($admin)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Admin has been deleted!'
            ]);
        }
    }

    public function master_admin_update_status(Admin $admin)
    {
        if ($this->adminRepository->changeStatus($admin->slug)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Status has been changed!'
            ]);
        }
    }

    public function master_admin_update(AdminUpdateRequest $request, $admin)
    {
        if ($request->validated()) {
            if ($this->adminRepository->updateAdmin($request, $admin)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Admin has been updated!'
                ]);
            }
        }
    }

    public function master_tenant_index()
    {
        return view('pages.admin.master.users.tenant.index');
    }

    public function master_tenant_update_status($tenant)
    {
        if ($this->tenantRepository->changeStatus($tenant)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Status has been changed!'
            ]);
        }
    }

    public function master_tenant_update(TenantUpdateRequest $request, $tenant)
    {
        if ($request->validated()) {
            if ($this->tenantRepository->updateTenant($request, $tenant)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Tenant has been updated!'
                ]);
            }
        }
    }

    public function master_tenant_show(Tenant $tenant)
    {
        return view('pages.admin.master.users.tenant.show', compact('tenant'));
    }

    public function master_tenant_destroy($tenant)
    {
        if ($this->tenantRepository->deleteTenant($tenant)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Tenant has been deleted!'
            ]);
        }
    }
}
