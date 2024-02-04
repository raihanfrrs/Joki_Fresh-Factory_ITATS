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

    public function getWarehouse($id)
    {
        return Warehouse::find($id);
    }

    public function createWarehouse($data)
    {
        $warehouse_id = Uuid::uuid4()->toString();

        $warehouse = Warehouse::create([
            'id' => $warehouse_id,
            'admin_id' => auth()->user()->admin->id,
            'warehouse_category_id' => $data['warehouse_category_id'],
            'name' => $data['name'],
            'capacity' => $data['capacity'],
            'facility' => $data['facility'],
            'surface_area' => $data['surface_area'],
            'building_area' => $data['building_area'],
            'city' => $data['city'],
            'address' => $data['address'],
            'description' => $data['description'],
            'payment_time' => $data['payment_time'],
        ]);

        if ($data->hasFile('warehouse_image')) {
            $media = $warehouse->addMediaFromRequest('warehouse_image')->withResponsiveImages()->toMediaCollection('warehouse_images');

            $media->where('model_type', Warehouse::class)
                ->where('model_id', $warehouse->id)
                ->update([
                    'model_id' => $warehouse->id,
                    'model_type' => Warehouse::class,
                ]);
        }

        return $warehouse;
    }

    public function updateWarehouse($data, $id)
    {
        return self::getWarehouse($id)->update([
            'name' => $data['name'],
            'warehouse_category_id' => $data['warehouse_category_id'],
            'capacity' => $data['capacity'],
            'facility'=> $data['facility'],
            'surface_area' => $data['surface_area'],
            'building_area' => $data['building_area'],
            'city' => $data['city'],
            'address' => $data['address'],
            'description' => $data['description'],
            'payment_time' => $data['payment_time']
        ]);
    }

    public function deleteWarehouse($warehouse)
    {
        $warehouse = self::getWarehouse($warehouse);
        if ($warehouse->trashed()) {
            return $warehouse->forceDelete();
        } else {
            return $warehouse->delete();
        }
    }
}