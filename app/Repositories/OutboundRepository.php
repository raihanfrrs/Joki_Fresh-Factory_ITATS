<?php

namespace App\Repositories;

use App\Models\Outbound;

class OutboundRepository
{
    public function getAllOutbound()
    {
        return Outbound::all();
    }

    public function getOutbound($id)
    {
        return Outbound::find($id);
    }

    public function getAllOutboundByWarehouseIdAndTenantId($warehouse_id)
    {
        return Outbound::where('warehouse_id', $warehouse_id)->where('tenant_id', auth()->user()->tenant->id)->get();
    }
}