<?php

namespace App\Repositories;

use App\Models\ProductCategory;

class ProductCategoryRepository
{
    public function getAllProductCategories()
    {
        return ProductCategory::all();
    }

    public function getProductCategory($id)
    {
        return ProductCategory::find($id);
    }

    public function getAllProductCategoryByWarehouseIdAndTenantId($warehouse_id)
    {
        return ProductCategory::where('warehouse_id', $warehouse_id)->where('tenant_id', auth()->user()->tenant->id)->get();
    }
}