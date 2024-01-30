<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function about()
    {
        return view('pages.guest.about.index');
    }

    public function service()
    {
        return view('pages.guest.service.index');
    }

    public function properties()
    {
        return view('pages.guest.properties.index');
    }

    public function contact()
    {
        return view('pages.guest.contact.index');
    }
}
