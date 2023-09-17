<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function master_admin_index()
    {
        return view('pages.admin.master.users.admin.index');
    }
}
