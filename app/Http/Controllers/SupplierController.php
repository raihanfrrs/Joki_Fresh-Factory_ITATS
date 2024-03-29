<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function warehouse_supplier_index(Warehouse $warehouse)
    {
        return view('pages.warehouse.master.supplier.index', [
            'warehouse' => $warehouse
        ]);
    }
}
