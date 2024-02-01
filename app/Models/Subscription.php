<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $keyType = "string";

    public function tenant_subscription()
    {
        return $this->hasOne(TenantSubscription::class);
    }

    public function warehouse_subscription()
    {
        return $this->hasMany(WarehouseSubscription::class);
    }
}
