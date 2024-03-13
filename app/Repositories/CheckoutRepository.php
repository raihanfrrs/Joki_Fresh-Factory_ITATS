<?php 

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use App\Repositories\BillingRepository;
use App\Repositories\TransactionRepository;

class CheckoutRepository
{
    protected $transactionRepository, $billingRepository;

    public function __construct(TransactionRepository $transactionRepository, BillingRepository $billingRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->billingRepository = $billingRepository;
    }

    public function storeTransaction($data, $transaction_id)
    {

        DB::transaction(function () use ($data, $transaction_id) {
            $transaction = $this->transactionRepository->getTransactionById($transaction_id);

            $transaction->update([
                'bank_id' => $this->billingRepository->getPrimaryBilling()->id,
                'status' => 'success'
            ]);

            if ($data->hasFile('transaction_image')) {
                $transaction->addMediaFromRequest('transaction_image')->withResponsiveImages()->toMediaCollection('transaction_images');
            }
        });

        return true;
    }

}