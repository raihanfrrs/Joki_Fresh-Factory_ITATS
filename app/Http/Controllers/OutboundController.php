<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class OutboundController extends Controller
{
    public function warehouse_outbound_index(Warehouse $warehouse)
    {
        return view('pages.warehouse.outbound.index', compact('warehouse'));
    }

    public function warehouse_outbound_create(Warehouse $warehouse)
    {
        return view('pages.warehouse.outbound.add', compact('warehouse'));
    }
}
