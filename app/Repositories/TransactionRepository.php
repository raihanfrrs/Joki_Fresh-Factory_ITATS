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

    public function getTransactionByStatus($status)
    {
        $query = Transaction::where('status', $status);

        if (auth()->user()->level == 'tenant') {
            $query->where('tenant_id', auth()->user()->tenant->id);
        }

        return $query->get();
    }

}