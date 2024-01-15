<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class TenantRepository
{
    public function getAllTenants()
    {
        return Tenant::orderBy('created_at', 'ASC')->get();
    }

    public function getTenant($id)
    {
        return Tenant::find($id);
    }

    public function updateTenant($data, $id)
    {
        return self::getTenant($id)->update([
            'name' => $data['name'],
            'identity_number' => $data['identity_number'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'pob' => $data['pob'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'address' => $data['address']
        ]);
    }

    public function changeStatus($id)
    {
        $tenant = self::getTenant($id);
        if ($tenant->status == 'active') {
            return $tenant->update(['status' => 'inactive']);
        } else {
            return $tenant->update(['status' => 'active']);
        }
    }

    public function deleteTenant($tenant)
    {
        $tenant = self::getTenant($tenant);
        if ($tenant->trashed()) {
            return $tenant->forceDelete();
        } else {
            return $tenant->delete();
        }
    }
}