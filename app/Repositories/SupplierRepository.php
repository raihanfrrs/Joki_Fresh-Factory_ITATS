<?php

namespace App\Repositories;

use App\Models\Supplier;

class SupplierRepository
{
    public function getAllSuppliers()
    {
        return Supplier::all();
    }

    public function getSupplier($id)
    {
        return Supplier::find($id);
    }

    public function getAllSupplierByWarehouseIdAndTenantId($warehouse_id)
    {
        return Supplier::where('warehouse_id', $warehouse_id)->where('tenant_id', auth()->user()->tenant->id)->get();
    }
}