<?php

namespace App\Repositories;

use App\Models\DetailTransaction;

class DetailTransactionRepository
{
    public function getDetailTransaction()
    {
        return DetailTransaction::all();
    }

    public function getDetailTransactionById($id)
    {
        return DetailTransaction::find($id);
    }

    public function getDetailTransactionByTransactionId($id)
    {
        return DetailTransaction::where('transaction_id', $id)->get();
    }

    public function getDetailTransactionByWarehouseId($id)
    {
        return DetailTransaction::join('warehouse_subscriptions', 'detail_transactions.warehouse_subscription_id', '=', 'warehouse_subscriptions.id')
                                ->where('warehouse_subscriptions.warehouse_id', $id)
                                ->get();
    }
}