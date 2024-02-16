<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $keyType = "string";
    protected $fillable = [
        'id',
        'tenant_id',
        'tax_id',
        'grand_total'

    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function detail_transaction()
    {
        return $this->hasMany(DetailTransaction::class);
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }
}
