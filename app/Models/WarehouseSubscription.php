<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseSubscription extends Model
{
    use HasFactory;
    protected $keyType = "string";

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function temp_transaction()
    {
        return $this->hasMany(TempTransaction::class);
    }
}
