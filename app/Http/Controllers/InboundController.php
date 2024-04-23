<?php

namespace App\Http\Controllers;

use App\Http\Requests\InboundStoreRequest;
use App\Models\Warehouse;
use App\Repositories\InboundRepository;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\SupplierRepository;

class InboundController extends Controller
{
    protected $productRepository, $supplierRepository, $inboundRepository;

    public function __construct(ProductRepository $productRepository, SupplierRepository $supplierRepository, InboundRepository $inboundRepository)
    {
        $this->productRepository = $productRepository;
        $this->supplierRepository = $supplierRepository;
        $this->inboundRepository = $inboundRepository;
    }

    public function warehouse_inbound_index(Warehouse $warehouse)
    {
        return view('pages.warehouse.inbound.index', [
            'warehouse' => $warehouse
        ]);
    }

    public function warehouse_inbound_create(Warehouse $warehouse)
    {
        return view('pages.warehouse.inbound.add', [
            'warehouse' => $warehouse,
            'products' => $this->productRepository->getAllProductByWarehouseIdAndTenantId($warehouse->id),
            'suppliers' => $this->supplierRepository->getAllSupplierByWarehouseIdAndTenantId($warehouse->id)
        ]);
    }

    public function warehouse_inbound_store(InboundStoreRequest $request, Warehouse $warehouse)
    {
        try {
            if ($request->validated()) {
                if ($this->inboundRepository->createInbound($request, $warehouse)) {
                    return redirect()->back()->with([
                        'flash-type' => 'sweetalert',
                        'case' => 'default',
                        'position' => 'center',
                        'type' => 'success',
                        'message' => 'Inbound has been created!'
                    ]);
                }
            }
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}