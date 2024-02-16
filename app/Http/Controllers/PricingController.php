<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Repositories\WarehouseRepository;
use App\Repositories\TempTransactionRepository;

class PricingController extends Controller
{
    protected $warehouseRepository, $tempTransactionRepository;

    public function __construct(WarehouseRepository $warehouseRepository, TempTransactionRepository $tempTransactionRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
        $this->tempTransactionRepository = $tempTransactionRepository;
    }

    public function pricing_index()
    {
        return view('pages.tenant.pricing.index', [
            'warehouses' => $this->warehouseRepository->getAllWarehouses()
        ]);
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