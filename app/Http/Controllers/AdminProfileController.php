<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUpdateRequest;
use App\Repositories\AdminProfileRepository;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    protected $adminProfileRepository;

    public function __construct(AdminProfileRepository $adminProfileRepository)
    {
        $this->adminProfileRepository = $adminProfileRepository;
    }

    public function admin_profile_index()
    {
        return view('pages.admin.profile.index');
    }

    public function admin_setting_profile_index()
    {
        return view('pages.admin.settings.index');
    }

    public function admin_setting_profile_update(AdminUpdateRequest $request, $admin)
    {
        try {
            if ($request->validated()) {
                if ($this->adminProfileRepository->updateAdminIdentity($request, $admin)) {
                    return redirect()->back()->with([
                        'flash-type' => 'sweetalert',
                        'case' => 'default',
                        'position' => 'center',
                        'type' => 'success',
                        'message' => 'Update Success!'
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function admin_setting_password_index()
    {
        return view('pages.admin.settings.index');
    }

    public function admin_setting_password_update(Request $request, $admin)
    {
        try {
            if ($this->adminProfileRepository->updateAdminPassword($request, $admin)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Change Password Success!'
                ]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
