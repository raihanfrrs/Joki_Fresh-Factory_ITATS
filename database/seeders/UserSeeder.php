<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'raihan123',
                'password' => bcrypt('test123'),
                'level' => 'admin'
            ],
            [
                'username' => 'achmada123',
                'password' => bcrypt('test123')
            ],
            [
                'username' => 'farras123',
                'password' => bcrypt('test123'),
                'level' => 'admin'
            ]
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
