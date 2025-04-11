<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QueryValue;

class QueryValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QueryValue::create([
            'enterprise_id' => 1,
            'driverLicense' => 100.00,
            'veichile' => 200.00,
            'face' => 150.00,
            'process' => 250.00,
            'description' => 'Example description',
            'status' => 'active',
            'deactivated_at' => null,
            'aggregated_base' => 300.00,
            'aggregated_additional' => 50.00,
            'aggregated_validity' => 90,
            'autonomous_base' => 400.00,
            'autonomous_additional' => 60.00,
            'autonomous_validity' => 60,
            'fleet_base' => 500.00,
            'fleet_additional' => 70.00,
            'fleet_validity' => 120,
            'autonomous_recurring' => true,
            'aggregated_recurring' => true,
            'fleet_recurring' => true,
        ]);

        // Adicione mais registros conforme necessário
    }
}
