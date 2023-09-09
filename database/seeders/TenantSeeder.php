<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = [
            [
                'user_id' => 2,
                'name' => 'Achmada Fiqri',
                'slug' => 'achmada-fiqri',
                'identity_number' => '4989197566292068',
                'email' => 'achmadafiqri76@gmail.com',
                'phone' => '081333903188',
                'pod' => 'Surabaya',
                'bod' => now(),
                'gender' => 'male',
                'address' => 'Jl. Arief Rahman Hakim No.100, Klampis Ngasem, Kec. Sukolilo, Surabaya, Jawa Timur 60117'
            ]
        ];

        foreach ($tenants as $key => $tenant) {
            Tenant::create($tenant);
        }
    }
}
