<?php 

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProduct($id)
    {
        return Product::find($id);
    }

    public function getAllProductByWarehouseIdAndTenantId($warehouse_id)
    {
        return Product::where('warehouse_id', $warehouse_id)->where('tenant_id', auth()->user()->tenant->id)->get();
    }
}