<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Repositories\TaxRepository;
use App\Repositories\RentedRepository;
use App\Repositories\TempTransactionRepository;

class CartController extends Controller
{
    protected $tempTransactionRepository, $taxRepository, $rentedRepository;

    public function __construct(TempTransactionRepository $tempTransactionRepository, TaxRepository $taxRepository, RentedRepository $rentedRepository)
    {
        $this->tempTransactionRepository = $tempTransactionRepository;
        $this->taxRepository = $taxRepository;
        $this->rentedRepository = $rentedRepository;
    }

    public function cart_index()
    {
        return view('pages.tenant.cart.index', [
            'carts' => $this->tempTransactionRepository->getTempTransactionByTenantId()->get(),
            'tax' => $this->taxRepository->getTaxByStatus('active')->first()
        ]);
    }

    public function cart_store()
    {
        if ($this->rentedRepository->checkIfRentedExistFromTempTransaction()->count()) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'warning',
                'message' => 'You Already Rented!'
            ]);
        }

        if ($this->tempTransactionRepository->storeToTransaction()) {
            return redirect()->route('shopping.cart.payment', $this->tempTransactionRepository->storeToTransaction())->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Checkout Success!'
            ]);
        }
    }

    public function cart_payment(Transaction $transaction)
    {
        return view('pages.tenant.cart.payment', compact('transaction'));
    }
}
