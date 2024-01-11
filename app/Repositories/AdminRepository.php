<?php

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class AdminRepository
{
    public function getAllAdminExceptMe($id): Collection
    {
        return Admin::whereNot('user_id', $id)
                    ->get();
    }

    public function getAdmin($slug)
    {
        return Admin::where('slug', $slug)->first();
    }

    public function createAdmin($data)
    {
        return Admin::create([
            'user_id' => $data['user_id'],
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
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
}