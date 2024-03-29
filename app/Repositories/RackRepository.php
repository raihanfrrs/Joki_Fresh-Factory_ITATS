<?php

namespace App\Repositories;

use App\Models\Rack;

class RackRepository
{
    public function getAllRacks()
    {
        return Rack::all();
    }

    public function getRack($id)
    {
        return Rack::find($id);
    }

    public function getAllRackByWarehouseIdAndTenantId($warehouse_id)
    {
        return Rack::where('warehouse_id', $warehouse_id)->where('tenant_id', auth()->user()->tenant->id)->get();
    }
}