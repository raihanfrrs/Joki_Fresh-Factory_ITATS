<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $keyType = "string";
    protected $guarded = [
        'id'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function warehouse_category()
    {
        return $this->belongsTo(WarehouseCategory::class);
    }
}
