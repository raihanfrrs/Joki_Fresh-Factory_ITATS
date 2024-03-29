<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function warehouse_product_index(Warehouse $warehouse)
    {
        return view('pages.warehouse.master.product.index', [
            'warehouse' => $warehouse
        ]);
    }
}
