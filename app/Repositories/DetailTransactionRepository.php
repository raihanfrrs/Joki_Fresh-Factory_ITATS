<?php

namespace App\Repositories;

use App\Models\DetailTransaction;

class DetailTransactionRepository
{
    public function getDetailTransaction()
    {
        return DetailTransaction::all();
    }

    public function getDetailTransactionByTransactionId($id)
    {
        return DetailTransaction::where('transaction_id', $id)->get();
    }
}