<?php

namespace App\Repositories;

use App\Models\Customer;

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
}