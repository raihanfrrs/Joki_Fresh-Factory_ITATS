<?php

namespace App\Repositories;

use App\Models\Admin;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class AdminRepository
{
    public function getAllAdminExceptMe($id): Collection
    {
        return Admin::whereNot('user_id', $id)
                    ->orderBy('created_at', 'ASC')->get()
                    ->get();
    }

    public function getAdmin($id)
    {
        return Admin::find($id);
    }

    public function createAdmin($data)
    {
        return Admin::create([
            'id' => Uuid::uuid4()->toString(),
            'user_id' => $data['user_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'pob' => $data['pob'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'address' => $data['address'],
        ]);
    }

    public function changeStatus($slug)
    {
        $admin = self::getAdmin($slug);

        if ($admin->status == 'active') {
            return $admin->update(['status' => 'inactive']);
        } else {
            return $admin->update(['status' => 'active']);
        }
    }

    public function updateAdmin($data, $id)
    {
        return self::getAdmin($id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'pob' => $data['pob'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'address' => $data['address']
        ]);
    }

    public function destroyAdmin($admin)
    {
        $admin = self::getAdmin($admin);
        if ($admin->trashed()) {
            return $admin->forceDelete();
        } else {
            return $admin->delete();
        }
    }
}