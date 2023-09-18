<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function master_admin_index()
    {
        return view('pages.admin.master.users.admin.index');
    }

    public function master_admin_store(AdminRequest $adminRequest)
    {
        $adminRequest->validated();
    }
}
