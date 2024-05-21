<?php 

namespace App\Repositories;

use Ramsey\Uuid\Uuid;
use App\Models\Customer;
use App\Models\Warehouse;
use App\Models\TempOutbound;

class TempOutboundRepository
{
    public function getAllTempOutbounds()
    {
        return TempOutbound::all();
    }

    public function getAllTempOutboundsByWarehouseIdAndTenantId($warehouse)
    {
        return TempOutbound::where('tenant_id', auth()->user()->tenant->id)->where('warehouse_id', $warehouse->id)->get();
    }

    public function checkTempOutbounds($warehouse)
    {
        return TempOutbound::where('tenant_id', auth()->user()->tenant->id)
                            ->where('warehouse_id', $warehouse->id)
                            ->where('subscription_id', $warehouse->rented->warehouse_subscription->subscription_id)
                            ->count();
    }

    public function checkIfCustomerExist($warehouse, $customer)
    {
        return TempOutbound::where('tenant_id', auth()->user()->tenant->id)
                            ->where('warehouse_id', $warehouse->id)
                            ->where('subscription_id', $warehouse->rented->warehouse_subscription->subscription_id)
                            ->where('customer_id', $customer->id)
                            ->count();
    }

    public function checkIfProductExist($warehouse)
    {
        $check_products = TempOutbound::where('tenant_id', auth()->user()->tenant->id)
                            ->where('warehouse_id', $warehouse->id)
                            ->where('subscription_id', $warehouse->rented->warehouse_subscription->subscription_id)
                            ->get();

        $counter = 0;

        foreach ($check_products as $key => $check_product) {
            if ($check_product->product_id) {
                $counter++;
            }
        }

        return $counter;
    }

    public function getProductsTempOutbounds($warehouse)
    {
        return TempOutbound::where('tenant_id', auth()->user()->tenant->id)
                            ->where('warehouse_id', $warehouse->id)
                            ->where('subscription_id', $warehouse->rented->warehouse_subscription->subscription_id)
                            ->get();
    }
    
    public function getCustomerTempOutbounds($warehouse)
    {
        $customers = TempOutbound::where('tenant_id', auth()->user()->tenant->id)
                            ->where('warehouse_id', $warehouse->id)
                            ->where('subscription_id', $warehouse->rented->warehouse_subscription->subscription_id)
                            ->get();

        $item = array();
        foreach ($customers as $key => $customer) {
            $item[] = $customer->customer_id;
        }

        return Customer::where('warehouse_id', $warehouse->id)
                    ->where('tenant_id', auth()->user()->tenant->id)
                    ->whereNotIn('id', $item)
                    ->get();
    }

    public function updateTempOutboundWithNewCustomer($warehouse, $customer)
    {
        return TempOutbound::where('tenant_id', auth()->user()->tenant->id)
                            ->where('warehouse_id', $warehouse->id)
                            ->where('subscription_id', $warehouse->rented->warehouse_subscription->subscription_id)
                            ->update([
                                'customer_id' => $customer->id
                            ]);
    }

    public function createTempOutboundWithNewCustomer($warehouse, $customer)
    {
        if (self::checkTempOutbounds($warehouse) > 0) {
            return self::updateTempOutboundWithNewCustomer($warehouse, $customer);
        } else {
            return false;
        }
    }

    public function createTempOutboundWithNewOneProduct($warehouse, $product)
    {
        return TempOutbound::create([
            'id' => Uuid::uuid4()->toString(),
            'tenant_id' => auth()->user()->tenant->id,
            'warehouse_id' => $warehouse->id,
            'subscription_id' => $warehouse->rented->warehouse_subscription->subscription_id,
            'product_id' => $product->id,
            'quantity' => 1,
            'subtotal' => $product->sale_price
        ]);
    }
}