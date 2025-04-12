<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QueryValuesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('query_values')->insert([
            [
                'enterprise_id' => 1,
                'individual_driver_price' => 50.00,
                'individual_vehicle_price' => 75.00,
                'unified_price' => 100.00,
                'validity_days' => 30,
                'individual_driver_recurring' => true,
                'individual_vehicle_recurring' => true,
                'unified_recurring' => true,
                'description' => 'Valores padrão para pesquisas',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
