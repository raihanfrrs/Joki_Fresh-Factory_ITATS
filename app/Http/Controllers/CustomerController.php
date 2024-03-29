<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function warehouse_customer_index(Warehouse $warehouse)
    {
        return view('pages.warehouse.master.customer.index', [
            'warehouse' => $warehouse
        ]);
    }   
}
