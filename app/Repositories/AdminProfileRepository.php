<?php

namespace App\Repositories;

use App\Models\Admin;

class AdminProfileRepository
{
    protected $adminRepository;
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function getAdminIdentity($id)
    {
        return Admin::find($id);
    }

    public function updateAdminIdentity($data, $id)
    {
        $admin = self::getAdminIdentity($id);
        $admin->update([
            'name' => $data->name,
            'phone' => $data->phone,
            'email' => $data->email,
            'pob' => $data->pob,
            'dob' => $data->dob,
            'gender' => $data->gender,
            'address' => $data->address
        ]);

        if ($data->hasFile('admin_image')) {
            $media = $admin->addMediaFromRequest('admin_image')->withResponsiveImages()->toMediaCollection('admin_images');

            $media->where('model_type', Admin::class)
                ->where('model_id', $admin->id)
                ->update([
                    'model_id' => $admin->id,
                    'model_type' => Admin::class,
                ]);
        }

        return true;
    }

    public function updateAdminPassword($data, $id)
    {
        $user_id = Admin::find($id)->user_id;
        return $this->adminRepository->updateAdminPassword($data, $user_id);
    }
}