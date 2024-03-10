<?php 

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    protected $rented;

    public function __construct(RentedRepository $rentedRepository)
    {
        $this->rented = $rentedRepository;
    }

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

    public function updateTransactionStatus($id, $status)
    {
        $transaction = self::getTransactionById($id);

        if ($status == 'success') {
            $transaction->update([
                'status' => 'confirmed'
            ]);

            return $this->rented->updateRentedStatusByTransactionId($id);
        } elseif ($status == 'declined') {
            $transaction->update([
                'status' => 'declined'
            ]);

            foreach ($this->rented->getRentedByTransactionId($id) as $key => $item) {
                $this->rented->deleteRented($item->id);
            }

            return true;
        }
    }

}