<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function master_admin_card()
    {
        return view('components.ajax.data-master-admin-card');
    }

    public function master_admin_table()
    {
        return view('components.ajax.data-master-admin-table');
    }
}
