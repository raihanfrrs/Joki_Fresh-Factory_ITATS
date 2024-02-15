<?php

namespace App\Repositories;

use Ramsey\Uuid\Uuid;
use App\Models\TempTransaction;

class TempTransactionRepository
{
    protected $warehouseSubscriptionRepository;

    public function __construct(WarehouseSubscriptionRepository $warehouseSubscriptionRepository)
    {
        $this->warehouseSubscriptionRepository = $warehouseSubscriptionRepository;
    }

    public function getTempTransactionById($id)
    {
        return TempTransaction::find($id);
    }

    public function getTempTransactionByWarehouseId($warehouse_id)
    {
        return TempTransaction::where('warehouse_id', $warehouse_id)->where('tenant_id', auth()->user()->tenant->id)->first();
    }

    public function getTempTransactionByTenantId()
    {
        return TempTransaction::where('tenant_id', auth()->user()->tenant->id);
    }

    public function createTempTransaction($warehouse)
    {
        return TempTransaction::create([
            'id' => Uuid::uuid4()->toString(),
            'warehouse_id' => $warehouse->id,
            'warehouse_subscription_id' => $warehouse->warehouse_subscription->sortBy('subscription.month_duration')->first()->id,
            'tenant_id' => auth()->user()->tenant->id,
            'subtotal' => $warehouse->warehouse_subscription->sortBy('subscription.month_duration')->first()->total_price
        ]);
    }

    public function destroyTempTransaction($id)
    {
        return self::getTempTransactionById($id)->delete();
    }

    public function updateTempTransaction($data, $id)
    {
        return self::getTempTransactionById($id)->update([
            'warehouse_subscription_id' => $data['warehouse_subscription_id'],
            'subtotal' => $this->warehouseSubscriptionRepository->getWarehouseSubscription($data['warehouse_subscription_id'])->total_price
        ]);
    }

    public function updateTempTransactionStatus()
    {
        return self::getTempTransactionByTenantId()->update([
            'status' => 'payment',
            'payment_due' => now()->addHour()
        ]);
    }
}