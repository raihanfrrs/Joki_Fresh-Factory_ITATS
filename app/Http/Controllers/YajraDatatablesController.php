<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class YajraDatatablesController extends Controller
{
    public function admin_index()
    {
        return DataTables::of(User::where('level', 'admin')
                                    ->get())
        ->addColumn('name', function ($model) {
            return view('components.data-ajax.data-master-admin.name-column', compact('model'))->render();
        })
        ->addColumn('email', function ($model) {
            return view('components.data-ajax.data-master-admin.email-column', compact('model'))->render();
        })
        ->addColumn('phone', function ($model) {
            return view('components.data-ajax.data-master-admin.phone-column', compact('model'))->render();
        })
        ->addColumn('pob_dob', function ($model) {
            return view('components.data-ajax.data-master-admin.pob-dob-column', compact('model'))->render();
        })
        ->addColumn('gender', function ($model) {
            return view('components.data-ajax.data-master-admin.gender-column', compact('model'))->render();
        })
        ->addColumn('address', function ($model) {
            return view('components.data-ajax.data-master-admin.address-column', compact('model'))->render();
        })
        ->addColumn('created_at', function ($model) {
            return view('components.data-ajax.data-master-admin.created-at-column', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('components.data-ajax.data-master-admin.status-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.data-master-admin.action-column', compact('model'))->render();
        })
        ->rawColumns(['name', 'email', 'phone', 'pob_dob', 'gender', 'address', 'created_at', 'status', 'action'])
        ->make(true);
    }
}
