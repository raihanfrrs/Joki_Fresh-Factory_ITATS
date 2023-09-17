<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class YajraDatatablesController extends Controller
{
    public function data_admin()
    {
        return DataTables::of(Admin::whereNot('user_id', auth()->user()->id)->get())
        ->make(true);
    }
}
