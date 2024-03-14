<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Repositories\TransactionRepository;
use App\Repositories\UserRepository;
use App\Repositories\WarehouseRepository;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    protected $warehouseRepository, $transactionRepository, $userRepository;

    public function __construct(WarehouseRepository $warehouseRepository, TransactionRepository $transactionRepository, UserRepository $userRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
        $this->transactionRepository = $transactionRepository;
        $this->userRepository = $userRepository;
    }

    public function about()
    {
        return view('pages.guest.about.index', [
            'transactions' => $this->transactionRepository->getTransactionByStatus('confirmed')->count(),
            'warehouses' => $this->warehouseRepository->getAllWarehouses()->count(),
            'users' => $this->userRepository->getAllUserTenant()->count(),
        ]);
    }

    public function service()
    {
        return view('pages.guest.service.index');
    }

    public function properties()
    {
        return view('pages.guest.properties.index', [
            'warehouses' => $this->warehouseRepository->getAllWarehouses(),
        ]);
    }

    public function properties_detail(Warehouse $warehouse)
    {
        return view('pages.guest.properties.show', [
            'warehouse' => $warehouse,
            'warehouses' => $this->warehouseRepository->getWarehousesExceptThisWarehouse($warehouse->id)
        ]);
    }

    public function contact()
    {
        return view('pages.guest.contact.index');
    }
}
