<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Tenant;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    private $admin;
    private $tenant;

    public function __construct(Admin $admin, Tenant $tenant) {
        $this->admin = $admin;
        $this->tenant = $tenant;
    }

    public function master_admin_card()
    {
        return view('components.ajax.data-master-admin-card', [
            'admins' => $this->admin->getAllAdminExceptMe(auth()->user()->id)
        ]);
    }

    public function master_admin_table()
    {
        return view('components.ajax.data-master-admin-table');
    }

    public function admin_edit_modal(Request $)
}