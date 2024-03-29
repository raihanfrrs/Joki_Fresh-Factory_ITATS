<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function warehouse_category_index(Warehouse $warehouse)
    {
        return view('pages.warehouse.master.category.index', [
            'warehouse' => $warehouse
        ]);
    }
}
