<?php

namespace App\Http\Controllers;

use App\Repositories\RentedRepository;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\WarehouseRepository;
use App\Repositories\TransactionRepository;

class LayoutController extends Controller
{
    protected $warehouseRepository, $transactionRepository, $userRepository, $rentedRepository;

    public function __construct(WarehouseRepository $warehouseRepository, TransactionRepository $transactionRepository, UserRepository $userRepository, RentedRepository $rentedRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
        $this->transactionRepository = $transactionRepository;
        $this->userRepository = $userRepository;
        $this->rentedRepository = $rentedRepository;
    }

    public function index()
    {
        if (Auth::check()) {
            $this->rentedRepository->deleteRentWhenExpiredToday();
        }

        if (Auth::check() && auth()->user()->level == 'tenant') {
            return view('pages.tenant.dashboard.index');
        } elseif (Auth::check() && auth()->user()->level == 'admin') {
            return view('pages.admin.dashboard.index');
        } else {
            return view('pages.guest.dashboard.index', [
                'transactions' => $this->transactionRepository->getTransactionByStatus('confirmed')->count(),
                'warehouses' => $this->warehouseRepository->getAllWarehouses()->count(),
                'users' => $this->userRepository->getAllUserTenant()->count(),
            ]);
        }
    }
}
