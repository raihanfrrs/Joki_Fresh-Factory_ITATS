<?php 

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use App\Repositories\BillingRepository;
use App\Repositories\TransactionRepository;

class CheckoutRepository
{
    protected $transactionRepository, $detailTransactionRepository, $billingRepository, $warehouseRepository;

    public function __construct(TransactionRepository $transactionRepository, DetailTransactionRepository $detailTransactionRepository, BillingRepository $billingRepository, WarehouseRepository $warehouseRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->detailTransactionRepository = $detailTransactionRepository;
        $this->billingRepository = $billingRepository;
        $this->warehouseRepository = $warehouseRepository;
    }

    public function storeTransaction($data, $transaction_id)
    {
        $transaction = $this->transactionRepository->getTransactionById($transaction_id);

        if ($transaction->status == 'success') {
            return false;
        }

        DB::transaction(function () use ($data, $transaction) {

            $transaction->update([
                // 'bank_id' => $this->billingRepository->getPrimaryBilling()->id,
                'status' => 'success'
            ]);

            // if ($data->hasFile('transaction_image')) {
            //     $transaction->addMediaFromRequest('transaction_image')->withResponsiveImages()->toMediaCollection('transaction_images');
            // }
        });

        foreach ($this->detailTransactionRepository->getDetailTransactionByTransactionId($transaction_id) as $key => $detail_transaction) {
            $this->warehouseRepository->updateStatusWarehouse($detail_transaction->warehouse_subscription->warehouse_id, 'rented');
        }

        return true;
    }

}