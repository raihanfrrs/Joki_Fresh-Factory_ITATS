<?php 

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use App\Repositories\TransactionRepository;

class CheckoutRepository
{
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function storeTransaction($data, $transaction_id)
    {

        DB::transaction(function () use ($data, $transaction_id) {
            $transaction = $this->transactionRepository->getTransactionById($transaction_id);

            $transaction->update([
                'status' => 'success'
            ]);

            if ($data->hasFile('transaction_image')) {
                $transaction->addMediaFromRequest('transaction_image')->withResponsiveImages()->toMediaCollection('transaction_images');
            }
        });

        return true;
    }

}