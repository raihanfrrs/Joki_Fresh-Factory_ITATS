<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Repositories\CheckoutRepository;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $checkoutRepository;

    public function __construct(CheckoutRepository $checkoutRepository)
    {
        $this->checkoutRepository = $checkoutRepository;
    }

    public function transaction_index($status)
    {
        return view('pages.tenant.transaction.index', [
            'status' => $status
        ]);
    }

    public function transaction_show(Transaction $transaction)
    {
        return view('pages.tenant.transaction.invoice.index', compact('transaction'));
    }

    public function transaction_store(Request $request, Transaction $transaction)
    {
        if ($this->checkoutRepository->storeTransaction($request, $transaction->id)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Checkout Success!'
            ]);
        }
    }
}
