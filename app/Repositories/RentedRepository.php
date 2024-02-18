<?php 

namespace App\Repositories;

use App\Models\Rented;
use App\Repositories\TempTransactionRepository;

class RentedRepository
{
    protected $tempTransactionRepository;

    public function __construct(TempTransactionRepository $tempTransactionRepository)
    {
        $this->tempTransactionRepository = $tempTransactionRepository;   
    }

    public function checkIfRentedExistFromTempTransaction()
    {
        $data = [];
        foreach ($this->tempTransactionRepository->getTempTransactionByTenantId()->get() as $key => $item) {
            $data[] = $item->warehouse_subscription->warehouse_id;
        }

        return Rented::where('tenant_id', auth()->user()->tenant->id)
                    ->whereIn('warehouse_id', $data);
    }
}