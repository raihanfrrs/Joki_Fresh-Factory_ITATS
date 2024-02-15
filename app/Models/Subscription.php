<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;
    protected $keyType = "string";
    protected $fillable = [
        'id',
        'name',
        'month_duration'
    ];

    public function warehouse_subscription()
    {
        return $this->hasMany(WarehouseSubscription::class);
    }

    public function warehouse_subscription_cart()
    {
        return $this->hasMany(WarehouseSubscriptionCart::class);
    }
}
