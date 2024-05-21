<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\TempOutboundRepository;

class OutboundController extends Controller
{
    protected $customerRepository, $productRepository, $tempOutboundRepository;
    
    public function __construct(CustomerRepository $customerRepository, ProductRepository $productRepository, TempOutboundRepository $tempOutboundRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->productRepository = $productRepository;
        $this->tempOutboundRepository = $tempOutboundRepository;
    }

    public function warehouse_outbound_index(Warehouse $warehouse)
    {
        return view('pages.warehouse.outbound.index', compact('warehouse'));
    }

    public function warehouse_outbound_create(Warehouse $warehouse)
    {
        $tempOutbound = $this->tempOutboundRepository->checkTempOutbounds($warehouse);
        $tempOutbounds = $this->tempOutboundRepository->getAllTempOutboundsByWarehouseIdAndTenantId($warehouse);

        return view('pages.warehouse.outbound.add', compact('warehouse', 'tempOutbound', 'tempOutbounds'));
    }

    public function warehouse_outbound_customer_store(Warehouse $warehouse, Customer $customer)
    {
        if ($this->tempOutboundRepository->createTempOutboundWithNewCustomer($warehouse, $customer)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Customer has been added!'
            ]);
        } else {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Product must be added first!'
            ]);
        }
    }
}
