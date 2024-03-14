<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Admin;
use Ramsey\Uuid\Uuid;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Repositories\AdminRepository;
use App\Repositories\TenantRepository;

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

    public function getAllUserAdminExceptCore()
    {
        return User::where('level', 'admin')
                    ->whereNot('attribute', 'core')
                    ->orderBy('created_at', 'ASC')
                    ->get();
    }

    public function getAllUserTenant()
    {
        return User::where('level', 'tenant')->get();
    }

    public function getUser($id)
    {
        return User::find($id);
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

    public function updateUserPassword($data, $id)
    {
        return self::getUser($id)->update([
            'password' => bcrypt($data['newPassword']),
        ]);
    }

    public function deactivateUser()
    {
        if (auth()->user()->level == 'admin') {
            return Admin::find(auth()->user()->admin->id)->update([
                'status' => 'inactive'
            ]);
        } elseif (auth()->user()->level == 'tenant') {
            return Tenant::find(auth()->user()->tenant->id)->update([
                'status' => 'inactive'
            ]);
        }
    }
}