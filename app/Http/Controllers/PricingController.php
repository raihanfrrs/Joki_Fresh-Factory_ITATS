<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Repositories\WarehouseRepository;
use App\Repositories\TempTransactionRepository;
use App\Repositories\WarehouseCategoryRepository;

class PricingController extends Controller
{
    protected $warehouseRepository, $tempTransactionRepository, $warehouseCategoryRepository;

    public function __construct(WarehouseRepository $warehouseRepository, TempTransactionRepository $tempTransactionRepository, WarehouseCategoryRepository $warehouseCategoryRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
        $this->tempTransactionRepository = $tempTransactionRepository;
        $this->warehouseCategoryRepository = $warehouseCategoryRepository;
    }

    public function pricing_index($warehouse_category)
    {
        $warehouse_categories = $this->warehouseCategoryRepository->getAllWarehouseCategories();

        if ($warehouse_category == 'all') {
            $warehouses = $this->warehouseRepository->getAllWarehouses()->where('warehouse_category_id' ,$this->warehouseCategoryRepository->getAllWarehouseCategoriesExistingInWarehouse()->first()->id);
        } else {
            $warehouses = $this->warehouseRepository->getAllWarehouses()->where('warehouse_category_id', $warehouse_category);
        }

        $category = null;

        $category = $warehouse_category == 'all' ? $this->warehouseCategoryRepository->getAllWarehouseCategoriesExistingInWarehouse()->first()->id : $this->warehouseCategoryRepository->getWarehouseCategory($warehouse_category)->id;

        return view('pages.tenant.pricing.index', compact('warehouses', 'category', 'warehouse_categories'));
    }

    public function pricing_store_cart(Warehouse $warehouse)
    {
        if ($this->tempTransactionRepository->getTempTransactionByWarehouseId($warehouse->id)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'warning',
                'message' => 'Warehouse is already in cart'
            ]);
        }
        
        if ($this->tempTransactionRepository->createTempTransaction($warehouse)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Warehouse added to cart'
            ]);
        }
    }
}
