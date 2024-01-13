<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class UserRepository
{
    public function getUserExceptMeAndCore(string $id)
    {
        return User::where('level', 'admin')
                    ->whereNot('attribute', 'core')
                    ->whereNot('id', $id)
                    ->get();
    }

    public function createUser($data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'level' => $data['level']
        ]);
    }
}