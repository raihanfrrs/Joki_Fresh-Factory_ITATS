<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Repositories\CustomerRepository;
use App\Repositories\ProductRepository;

class OutboundController extends Controller
{
    protected $customerRepository, $productRepository;
    
    public function __construct(CustomerRepository $customerRepository, ProductRepository $productRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->productRepository = $productRepository;
    }

    public function warehouse_outbound_index(Warehouse $warehouse)
    {
        return view('pages.warehouse.outbound.index', compact('warehouse'));
    }

    public function warehouse_outbound_create(Warehouse $warehouse)
    {
        $customers = $this->customerRepository->getAllCustomerByWarehouseIdAndTenantId($warehouse->id);
        $products = $this->productRepository->getAllProductByWarehouseIdAndTenantId($warehouse->id);

        return view('pages.warehouse.outbound.add', compact('warehouse', 'customers', 'products'));
    }
}
