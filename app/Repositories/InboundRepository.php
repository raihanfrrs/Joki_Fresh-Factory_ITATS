<?php

namespace App\Repositories;

use App\Models\Batch;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class InboundRepository
{
    public function getAllInbound()
    {
        return Batch::all();
    }

    public function getInbound($id)
    {
        return Batch::find($id);
    }

    public function getAllInboundByWarehouseIdAndTenantId($warehouse_id)
    {
        return Batch::where('warehouse_id', $warehouse_id)->where('tenant_id', auth()->user()->tenant->id)->get();
    }

    public function createInbound($data, $warehouse)
    {
        $inbound_id = Uuid::uuid4()->toString();

        DB::transaction(function () use ($data, $warehouse, $inbound_id) {
            Batch::create([
                'id' => $inbound_id,
                'tenant_id' => auth()->user()->tenant->id,
                'warehouse_id' => $warehouse->id,
                'subscription_id' => $warehouse->rented->warehouse_subscription->subscription_id,
                'supplier_id' => $data->supplier_id,
                'product_id' => $data->product_id,
                'code' => $data->code,
                'price' => intval(preg_replace("/[^0-9]/", "", $data->price)),
                'on_hand' => $data->on_hand,
                'available' => $data->on_hand,
                'received_at' => $data->received_at
            ]);
        });

        return true;
    }
}