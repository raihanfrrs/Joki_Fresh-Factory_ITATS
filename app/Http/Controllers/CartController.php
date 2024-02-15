<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TempTransactionRepository;

class CartController extends Controller
{
    protected $tempTransactionRepository;

    public function __construct(TempTransactionRepository $tempTransactionRepository)
    {
        $this->tempTransactionRepository = $tempTransactionRepository;
    }

    public function cart_index()
    {
        $carts = $this->tempTransactionRepository->getTempTransactionByTenantId()->where('status', 'pending')->get();
        return view('pages.tenant.cart.index', compact('carts'));
    }

    public function cart_store()
    {
        if ($this->tempTransactionRepository->updateTempTransactionStatus()) {
            return redirect()->route('shopping.cart.payment')->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Checkout Success!'
            ]);
        }
    }

    public function cart_payment()
    {
        $carts = $this->tempTransactionRepository->getTempTransactionByTenantId()->where('status', 'payment')->get();
        return view('pages.tenant.cart.payment', compact('carts'));
    }
}
