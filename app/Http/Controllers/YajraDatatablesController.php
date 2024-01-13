<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Repositories\TenantRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class YajraDatatablesController extends Controller
{
    protected $userRepository, $tenantRepository;

    public function __construct(UserRepository $userRepository, TenantRepository $tenantRepository)
    {
        $this->userRepository = $userRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function admin_index()
    {
        $users = $this->userRepository->getUserExceptMeAndCore(auth()->user()->id);

        return DataTables::of($users)
        ->addColumn('index', function ($model) use ($users) {
            return $users->search($model) + 1;
        })
        ->addColumn('name', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.name-column', compact('model'))->render();
        })
        ->addColumn('email', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.email-column', compact('model'))->render();
        })
        ->addColumn('phone', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.phone-column', compact('model'))->render();
        })
        ->addColumn('pob_dob', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.pob-dob-column', compact('model'))->render();
        })
        ->addColumn('gender', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.gender-column', compact('model'))->render();
        })
        ->addColumn('address', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.address-column', compact('model'))->render();
        })
        ->addColumn('created_at', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.created-at-column', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.status-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-admin.action-column', compact('model'))->render();
        })
        ->rawColumns(['name', 'email', 'phone', 'pob_dob', 'gender', 'address', 'created_at', 'status', 'action'])
        ->make(true);
    }

    public function tenant_index()
    {
        $tenants = $this->tenantRepository->getAllTenants();

        return DataTables::of($tenants)
        ->addColumn('index', function ($model) use ($tenants) {
            return $tenants->search($model) + 1;
        })
        ->addColumn('name', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.name-column', compact('model'))->render();
        })
        ->addColumn('identity_number', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.identity-number-column', compact('model'))->render();
        })
        ->addColumn('email', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.email-column', compact('model'))->render();
        })
        ->addColumn('phone', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.phone-column', compact('model'))->render();
        })
        ->addColumn('pob_dob', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.pob-dob-column', compact('model'))->render();
        })
        ->addColumn('gender', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.gender-column', compact('model'))->render();
        })
        ->addColumn('address', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.address-column', compact('model'))->render();
        })
        ->addColumn('created_at', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.created-at-column', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.status-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-master-tenant.action-column', compact('model'))->render();
        })
        ->rawColumns(['name', 'identity_number', 'email', 'phone', 'pob_dob', 'gender', 'address', 'created_at', 'status', 'action'])
        ->make(true);
    }
}
