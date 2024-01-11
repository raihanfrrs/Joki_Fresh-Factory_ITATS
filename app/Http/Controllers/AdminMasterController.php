<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequest;
use App\Repositories\AdminRepository;
use App\Repositories\UserRepository;

class AdminMasterController extends Controller
{
    private $adminRepository, $userRepository;

    public function __construct(AdminRepository $adminRepository, UserRepository $userRepository) {
        $this->adminRepository = $adminRepository;
        $this->userRepository = $userRepository;
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

    }

    public function master_admin_destroy(Admin $admin)
    {
        $admin->user->delete();
        $admin->delete();

        return redirect()->back()->with([
            'flash-type' => 'sweetalert',
            'case' => 'default',
            'position' => 'center',
            'type' => 'success',
            'message' => 'Admin has been deleted!'
        ]);
    }

    public function master_admin_update_status(Admin $admin)
    {
        $this->adminRepository->changeStatus($admin->slug);

        return redirect()->back()->with([
            'flash-type' => 'sweetalert',
            'case' => 'default',
            'position' => 'center',
            'type' => 'success',
            'message' => 'Status has been changed!'
        ]);
    }

    public function master_tenant_index()
    {
        
    }
}
