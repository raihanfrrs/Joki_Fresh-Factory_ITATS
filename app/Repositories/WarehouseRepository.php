<?php

namespace App\Repositories;

use Ramsey\Uuid\Uuid;
use App\Models\Warehouse;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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

    public function getWarehousesExceptThisWarehouse($id)
    {
        return Warehouse::where('id', '!=', $id)->limit(5)->get();
    }

    public function createWarehouse($data)
    {
        $warehouse_id = Uuid::uuid4()->toString();

        DB::transaction(function () use ($data, $warehouse_id) {
            $warehouse = Warehouse::create([
                'id' => $warehouse_id,
                'admin_id' => auth()->user()->admin->id,
                'warehouse_category_id' => $data['warehouse_category_id'],
                'name' => $data['name'],
                'capacity' => $data['capacity'],
                'surface_area' => $data['surface_area'],
                'building_area' => $data['building_area'],
                'country_id' => $data['country_id'],
                'zip_code' => $data['zip_code'],
                'city' => $data['city'],
                'address' => $data['address'],
                'description' => $data['description'] ?? '',
                'storage_shelves' => $data['storage_shelves'],
                'effective_lighting_system' => $data['effective_lighting_system'],
                'advanced_security_system' => $data['advanced_security_system'],
                'toilet_and_rest_area' => $data['toilet_and_rest_area'],
                'electricity' => $data['electricity'],
                'administrative_room_or_office' => $data['administrative_room_or_office'],
                'worker_safety_equipment' => $data['worker_safety_equipment'],
                'firefighting_tools' => $data['firefighting_tools'],
                'goods_handling_equipment' => $data['goods_handling_equipment'] ?? null
            ]);
    
            if ($data->hasFile('warehouse_image')) {
                foreach ($data->file('warehouse_image') as $key => $file) {
                    $media = $warehouse->addMedia($file)
                        ->withResponsiveImages()
                        ->toMediaCollection('warehouse_images');
            
                    $media->update([
                        'model_id' => $warehouse_id,
                        'model_type' => Warehouse::class,
                    ]);
                }
            }
        });

        return true;
    }

    public function updateWarehouse($data, $id)
    {
        DB::transaction(function () use ($data, $id) {
            $warehouse = self::getWarehouse($id);

            $warehouse->update([
                'warehouse_category_id' => $data['warehouse_category_id'],
                'name' => $data['name'],
                'capacity' => $data['capacity'],
                'surface_area' => $data['surface_area'],
                'building_area' => $data['building_area'],
                'country_id' => $data['country_id'],
                'zip_code' => $data['zip_code'],
                'city' => $data['city'],
                'address' => $data['address'],
                'description' => $data['description'] ?? '',
                'storage_shelves' => $data['storage_shelves'],
                'effective_lighting_system' => $data['effective_lighting_system'],
                'advanced_security_system' => $data['advanced_security_system'],
                'toilet_and_rest_area' => $data['toilet_and_rest_area'],
                'electricity' => $data['electricity'],
                'administrative_room_or_office' => $data['administrative_room_or_office'],
                'worker_safety_equipment' => $data['worker_safety_equipment'],
                'firefighting_tools' => $data['firefighting_tools'],
                'goods_handling_equipment' => $data['goods_handling_equipment'] ?? null
            ]);
    
            if ($data->hasFile('edit_warehouse_image')) {
                $warehouse->clearMediaCollection('warehouse_images');

                foreach ($data->file('edit_warehouse_image') as $key => $file) {
                    $media = $warehouse->addMedia($file)
                        ->withResponsiveImages()
                        ->toMediaCollection('warehouse_images');
            
                    $media->update([
                        'model_id' => $id,
                        'model_type' => Warehouse::class,
                    ]);
                }
            }
        });

        return true;
    }

    public function updateStatusWarehouse($id, $status)
    {
        $warehouse = self::getWarehouse($id);

        return $warehouse->update(['status' => $status]);
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