<?php 

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Rented;
use App\Repositories\TenantRepository;
use App\Repositories\TempTransactionRepository;

class RentedRepository
{
    protected $tempTransactionRepository, $tenantRepository;

    public function __construct(TempTransactionRepository $tempTransactionRepository, TenantRepository $tenantRepository)
    {
        $this->tempTransactionRepository = $tempTransactionRepository;
        $this->tenantRepository = $tenantRepository; 
    }

    public function getRented($id)
    {
        return Rented::find($id);
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

    public function getRentedByTransactionId($id)
    {
        return Rented::where('transaction_id', $id)->get();
    }

    public function updateRentedStatusByTransactionId($id)
    {
        foreach (self::getRentedByTransactionId($id) as $key => $item) {
            self::getRented($item->id)->update([
                'status' => 'active',
                'started_at' => Carbon::now(),
                'ended_at' => Carbon::now()->addMonths(self::getRented($item->id)->warehouse_subscription->subscription->month_duration)->endOfMonth()
            ]);

            $this->tenantRepository->getTenant($item->tenant_id)->update([
                'rank' => 'paid'
            ]);
        }

        return true;
    }

    public function deleteRented($id)
    {
        return self::getRented($id)->delete();
    }
}