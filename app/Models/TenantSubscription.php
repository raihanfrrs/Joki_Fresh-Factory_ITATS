<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantSubscription extends Model
{
    use HasFactory;
    protected $keyType = "string";

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
