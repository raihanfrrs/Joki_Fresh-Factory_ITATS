<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'user_id' => 1,
                'name' => 'Mohamad Raihan Farras',
                'slug' => 'mohamad-raihan-farras',
                'email' => 'rehanfarras76@gmail.com',
                'phone' => '081333903187',
                'pod' => 'Blitar',
                'bod' => now(),
                'gender' => 'male'
            ]
        ];

        foreach ($admins as $key => $admin) {
            Admin::create($admin);
        }
    }
}
