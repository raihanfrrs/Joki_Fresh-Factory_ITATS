<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class RackController extends Controller
{
    public function warehouse_rack_index(Warehouse $warehouse)
    {
        return view('pages.warehouse.master.rack.index', [
            'warehouse' => $warehouse
        ]);
    }
}
