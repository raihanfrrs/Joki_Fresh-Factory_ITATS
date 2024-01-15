<?php

namespace App\Repositories;

use Ramsey\Uuid\Uuid;
use App\Models\Warehouse;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class WarehouseRepository
{
    public function getAllWarehouses()
    {
        return Warehouse::orderBy('created_at', 'ASC')->get();
    }
}