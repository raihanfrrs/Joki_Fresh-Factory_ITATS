<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function warehouse_index(Warehouse $warehouse)
    {
        return view('pages.warehouse.dashboard.index', [
            'warehouse' => $warehouse
        ]);
    }
}
