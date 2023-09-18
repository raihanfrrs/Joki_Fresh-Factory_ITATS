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
                'pob' => 'Blitar',
                'dob' => now(),
                'gender' => 'male',
                'address' => 'Jl. Arief Rahman Hakim No.100, Klampis Ngasem, Kec. Sukolilo, Surabaya, Jawa Timur 60117'
            ],
            [
                'user_id' => 3,
                'name' => 'Mohamad Farras Raihan',
                'slug' => 'mohamad-farras-raihan',
                'email' => 'raihanfarras76@gmail.com',
                'phone' => '081333903188',
                'pob' => 'Blitar',
                'dob' => now(),
                'gender' => 'male',
                'address' => 'Jl. Arief Rahman Hakim No.100, Klampis Ngasem, Kec. Sukolilo, Surabaya, Jawa Timur 60117'
            ]
        ];

        foreach ($admins as $key => $admin) {
            Admin::create($admin);
        }
    }
}
