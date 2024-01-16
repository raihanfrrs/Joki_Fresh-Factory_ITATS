<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $keyType = "string";
    public $incrementing = false;
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'admin_id',
        'warehouse_category_id',
        'name',
        'capacity',
        'facility',
        'rental_price',
        'surface_area',
        'building_area',
        'city',
        'address',
        'description',
        'payment_time'
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
