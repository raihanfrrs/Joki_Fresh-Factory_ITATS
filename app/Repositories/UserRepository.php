<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Admin;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class UserRepository
{
    public function getUserExceptMeAndCore(string $id)
    {
        return User::where('level', 'admin')
                    ->whereNot('attribute', 'core')
                    ->whereNot('id', $id)
                    ->orderBy('created_at', 'ASC')
                    ->get();
    }

    public function createUserAndAdmin($data)
    {
        $uuid = Uuid::uuid4()->toString();

        $user = User::create([
            'id' => $uuid,
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'level' => 'admin'
        ]);

        $admin = Admin::create([
            'id' => Uuid::uuid4()->toString(),
            'user_id' => $uuid,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'pob' => $data['pob'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'address' => $data['address']
        ]);

        if ($data->hasFile('admin_image')) {
            $admin->addMediaFromRequest('admin_image')->withResponsiveImages()->toMediaCollection('admin_images');
        }

        return $user && $admin;
    }
}