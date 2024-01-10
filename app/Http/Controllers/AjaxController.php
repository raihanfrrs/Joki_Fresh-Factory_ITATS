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

}