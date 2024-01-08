<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    private $admin;
    private $user;

    public function __construct(Admin $admin, User $user) {
        $this->admin = $admin;
        $this->user = $user;
    }

    public function master_admin_index()
    {
        return view('pages.admin.master.users.admin.index');
    }

    public function master_admin_store(AdminRequest $adminRequest)
    {
        if ($adminRequest->validated()) {

            $data = $adminRequest->all();
            DB::transaction(function () use ($data, $adminRequest) {
                $data['level'] = 'admin';
                $user = $this->user->createUser($data);
    
                $data['user_id'] = $user->id;
                $admins = $this->admin->createAdmin($data);

                if ($adminRequest->hasFile('admin_image')) {
                    $admins->addMediaFromRequest('admin_image')->withResponsiveImages()->toMediaCollection('admin_images');
                }
            });

            return true;
        }
    }
}