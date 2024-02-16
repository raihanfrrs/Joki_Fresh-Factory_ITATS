<?php 

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    public function getAllTransactions()
    {
        return Transaction::all();
    }

    public function getTransactionById($id)
    {
        return Transaction::find($id);
    }
}