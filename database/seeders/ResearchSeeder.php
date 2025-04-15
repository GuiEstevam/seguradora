<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResearchSeeder extends Seeder
{
    public function run(): void
    {
        // Criar registros na tabela queries
        $queryIds = [];
        $queryIds[] = DB::table('queries')->insertGetId([
            'enterprise_id' => 1,
            'type' => 'individual',
            'subtype' => 'driver', // Subtipo adicionado
            'value' => 50.00,
            'status' => 'approved',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $queryIds[] = DB::table('queries')->insertGetId([
            'enterprise_id' => 1,
            'type' => 'individual',
            'subtype' => 'vehicle', // Subtipo adicionado
            'value' => 75.00,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $queryIds[] = DB::table('queries')->insertGetId([
            'enterprise_id' => 1,
            'type' => 'unified',
            'subtype' => 'aggregated', // Subtipo adicionado
            'value' => 100.00,
            'status' => 'denied',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $queryIds[] = DB::table('queries')->insertGetId([
            'enterprise_id' => 1,
            'type' => 'unified',
            'subtype' => 'autonomous', // Subtipo adicionado
            'value' => 120.00,
            'status' => 'approved',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $queryIds[] = DB::table('queries')->insertGetId([
            'enterprise_id' => 1,
            'type' => 'unified',
            'subtype' => 'fleet', // Subtipo adicionado
            'value' => 150.00,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Criar registros na tabela researches
        DB::table('researches')->insert([
            [
                'type' => 'individual',
                'subtype' => 'driver',
                'driver_data' => json_encode([
                    'cpf' => '12345678901',
                    'name' => 'João Silva',
                    'birthDate' => '1990-01-01',
                ]),
                'vehicle_data' => null,
                'query_id' => $queryIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'individual',
                'subtype' => 'vehicle',
                'driver_data' => null,
                'vehicle_data' => json_encode([
                    'plate' => 'ABC1234',
                    'renavam' => '987654321',
                ]),
                'query_id' => $queryIds[1],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'unified',
                'subtype' => 'aggregated',
                'driver_data' => json_encode([
                    'cpf' => '98765432100',
                    'name' => 'Maria Oliveira',
                    'birthDate' => '1985-05-15',
                ]),
                'vehicle_data' => json_encode([
                    'plate' => 'XYZ9876',
                    'renavam' => '123456789',
                ]),
                'query_id' => $queryIds[2],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'unified',
                'subtype' => 'autonomous',
                'driver_data' => json_encode([
                    'cpf' => '45678912300',
                    'name' => 'Carlos Souza',
                    'birthDate' => '1980-03-10',
                ]),
                'vehicle_data' => json_encode([
                    'plate' => 'DEF5678',
                    'renavam' => '654321987',
                ]),
                'query_id' => $queryIds[3],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'unified',
                'subtype' => 'fleet',
                'driver_data' => json_encode([
                    'cpf' => '78912345600',
                    'name' => 'Ana Paula',
                    'birthDate' => '1995-07-20',
                ]),
                'vehicle_data' => json_encode([
                    'plate' => 'GHI3456',
                    'renavam' => '321654987',
                ]),
                'query_id' => $queryIds[4],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
