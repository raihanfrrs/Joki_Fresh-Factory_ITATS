<?php

namespace App\Http\Controllers;

use App\Repositories\WarehouseRepository;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    protected $warehouseRepository;

    public function __construct(WarehouseRepository $warehouseRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
    }

    public function pricing_index()
    {
        return view('pages.tenant.pricing.index', [
            'warehouses' => $this->warehouseRepository->getAllWarehouses()
        ]);
    }
}
