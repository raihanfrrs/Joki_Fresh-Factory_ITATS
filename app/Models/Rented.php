<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rented extends Model
{
    use HasFactory;
    protected $keyType = "string";
    protected $fillable = [
        'id',
        'tenant_id',
        'warehouse_subscription_id',
        'warehouse_id',
        'started_at',
        'ended_at'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function warehouse_subscription()
    {
        return $this->belongsTo(WarehouseSubscription::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
