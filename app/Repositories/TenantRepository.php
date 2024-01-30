<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class TenantRepository
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

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

    public function updateTenantImage($data, $id)
    {
        $tenant = self::getTenant($id);

        if ($data->hasFile('tenant_image')) {
            $media = $tenant->addMediaFromRequest('tenant_image')->withResponsiveImages()->toMediaCollection('tenant_images');

            $media->where('model_type', Admin::class)
                ->where('model_id', $tenant->id)
                ->update([
                    'model_id' => $tenant->id,
                    'model_type' => Admin::class,
                ]);
        }

        return true;
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

    public function updateTenantPassword($data, $user_id)
    {
        $user = $this->userRepository->getUser($user_id);
        return $user->update(['password' => bcrypt($data->newPassword)]);
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