<?php

namespace App\Repositories;

use Ramsey\Uuid\Uuid;
use App\Models\Rented;
use App\Models\Transaction;
use App\Models\TempTransaction;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\DB;
use App\Repositories\TaxRepository;
use App\Repositories\WarehouseRepository;

class TempTransactionRepository
{
    protected $warehouseSubscriptionRepository, $taxRepository;

    public function __construct(WarehouseSubscriptionRepository $warehouseSubscriptionRepository, TaxRepository $taxRepository)
    {
        $this->warehouseSubscriptionRepository = $warehouseSubscriptionRepository;
        $this->taxRepository = $taxRepository;
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

    public function storeToTransaction()
    {
        $transaction_id = Uuid::uuid4()->toString();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaction_id,
                'gross_amount' => self::getTempTransactionByTenantId()->sum('subtotal') + (self::getTempTransactionByTenantId()->sum('subtotal') * $this->taxRepository->getTaxByStatus('active')->first()->value / 100),
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->tenant->name,
                'email' => auth()->user()->tenant->email
            )
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        Transaction::create([
            'id' => $transaction_id,
            'tenant_id' => auth()->user()->tenant->id,
            'tax_id' => $this->taxRepository->getTaxByStatus('active')->first()->id,
            'grand_total' => self::getTempTransactionByTenantId()->sum('subtotal') + (self::getTempTransactionByTenantId()->sum('subtotal') * $this->taxRepository->getTaxByStatus('active')->first()->value / 100),
            'payment_due' => now()->addHour(),
            'snap_token' => $snapToken
        ]);

        foreach (self::getTempTransactionByTenantId()->get() as $item) {
            DetailTransaction::create([
                'id' => Uuid::uuid4()->toString(),
                'transaction_id' => $transaction_id,
                'warehouse_subscription_id' => $item->warehouse_subscription_id,
                'subtotal' => $item->subtotal
            ]);

            Rented::create([
                'id' => Uuid::uuid4()->toString(),
                'tenant_id' => auth()->user()->tenant->id,
                'warehouse_subscription_id' => $item->warehouse_subscription_id,
                'warehouse_id' => $item->warehouse_id,
                'transaction_id' => $transaction_id
            ]);

            self::destroyTempTransaction($item->id);
        }

        return $transaction_id;
    }
}