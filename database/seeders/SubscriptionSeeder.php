<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subscriptions = [
            [
                'id' => Uuid::uuid4()->toString(),
                'name' => 'Starter',
                'month_duration' => 0
            ]
        ];

        foreach ($subscriptions as $key => $subscription) {
            Subscription::create($subscription);
        }
    }
}
