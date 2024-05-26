<?php

namespace App\Repositories;

use Ramsey\Uuid\Uuid;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerRepository
{
    public function getAllCustomers()
    {
        return Customer::all();
    }

    public function getCustomer($id)
    {
        return Customer::find($id);
    }

    public function getAllCustomerByWarehouseIdAndTenantId($warehouse_id)
    {
        return Customer::where('warehouse_id', $warehouse_id)->where('tenant_id', auth()->user()->tenant->id)->get();
    }

    public function createCustomer($data, $warehouse)
    {
        DB::transaction(function () use ($data, $warehouse) {
            $customer = Customer::create([
                'id' => Uuid::uuid4()->toString(),
                'tenant_id' => auth()->user()->tenant->id,
                'warehouse_id' => $warehouse->id,
                'subscription_id' => $warehouse->rented->warehouse_subscription->subscription_id,
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'address' => $data->address,
                'type' => $data->type,
            ]);
        });

        return true;
    }

    public function getAllCustomerWithJoinOutbound($warehouse)
    {
        return Customer::join('outbounds', 'customers.id', '=', 'outbounds.customer_id')
                        ->where('customers.warehouse_id', $warehouse->id)
                        ->where('customers.tenant_id', auth()->user()->tenant->id)
                        ->select('customers.*', DB::raw('SUM(amount_total) as amount_total'), DB::raw('SUM(grand_total) as grand_total'))
                        ->groupBy('customers.id')
                        ->get();
    }
}