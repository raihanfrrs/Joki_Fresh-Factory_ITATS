<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $keyType = "string";
    protected $fillable = [
        'id',
        'tenant_id',
        'warehouse_id',
        'subscription_id',
        'product_category_id',
        'rack_id',
        'name',
        'stock',
        'price',
        'weight',
        'dimension',
        'expired_date',
        'arrival_date',
        'description',
        'status',
        'availability_status'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function rack()
    {
        return $this->belongsTo(Rack::class);
    }

    public function batch()
    {
        return $this->hasMany(Batch::class);
    }
}
