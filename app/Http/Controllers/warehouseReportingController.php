<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class warehouseReportingController extends Controller
{
    public function warehouse_supplier_performance_reporting_index(Warehouse $warehouse)
    {
        return view('pages.warehouse.reporting.supplier-performance.index', [
            'warehouse' => $warehouse
        ]);
    }
}
