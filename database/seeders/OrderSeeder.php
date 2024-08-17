<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'user_id' => 1,
                'location' => 'Madina',
                'destination' => 'Jeddah',
                'no_of_trucks' => 3,
                'type_of_truck' => 'Flatbed',
                'company_name' => 'Transport Co',
                'cargo_type' => 'Electronics',
                'cargo_weight' => '20 tons',
                'pickup_time' => Carbon::now()->addDay(),
                'delivery_time' => Carbon::now()->addDays(5),
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
