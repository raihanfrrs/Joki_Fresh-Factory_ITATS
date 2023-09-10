<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    public function index()
    {
        if (Auth::check() && auth()->user()->level == 'tenant') {
            return view('pages.tenant.dashboard.index');
        } elseif (Auth::check() && auth()->user()->level == 'admin') {
            return view('pages.admin.dashboard.index');
        } else {
            return view('pages.guest.dashboard.index');
        }
    }
}
