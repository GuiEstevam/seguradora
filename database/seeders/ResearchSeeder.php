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
            'type' => 'individual_driver',
            'value' => 50.00,
            'status' => 'completed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $queryIds[] = DB::table('queries')->insertGetId([
            'enterprise_id' => 1,
            'type' => 'individual_vehicle',
            'value' => 75.00,
            'status' => 'completed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $queryIds[] = DB::table('queries')->insertGetId([
            'enterprise_id' => 1,
            'type' => 'unified',
            'value' => 100.00,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Criar registros na tabela researches
        DB::table('researches')->insert([
            [
                'type' => 'individual_driver',
                'driver_data' => json_encode([
                    'cpf' => '12345678901',
                    'name' => 'João Silva',
                    'birthDate' => '1990-01-01',
                    'rgNumber' => '12345678',
                    'rgUf' => 'SP',
                    'cnhRegisterNumber' => '987654321',
                    'cnhSecurityNumber' => '123456',
                    'cnhUf' => 'SP',
                    'infractions' => [
                        ['code' => '001', 'date' => '2025-01-01', 'points' => 5, 'description' => 'Excesso de velocidade'],
                        ['code' => '002', 'date' => '2025-02-15', 'points' => 3, 'description' => 'Avanço de sinal vermelho'],
                    ],
                    'suspensions' => [
                        ['reason' => 'Excesso de pontos', 'start_date' => '2025-03-01', 'end_date' => '2025-06-01'],
                    ],
                ]),
                'vehicle_data' => null,
                'query_id' => $queryIds[0], // Associar ao primeiro registro em queries
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'individual_vehicle',
                'driver_data' => null,
                'vehicle_data' => json_encode([
                    'plate' => 'ABC1234',
                    'renavam' => '987654321',
                    'uf' => 'RJ',
                    'restrictions' => [
                        ['type' => 'Renajud', 'start_date' => '2025-01-01', 'status' => 'Ativa'],
                        ['type' => 'Alienação', 'start_date' => '2024-12-01', 'status' => 'Resolvida'],
                    ],
                ]),
                'query_id' => $queryIds[1], // Associar ao segundo registro em queries
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'unified',
                'driver_data' => json_encode([
                    'cpf' => '98765432100',
                    'name' => 'Maria Oliveira',
                    'birthDate' => '1985-05-15',
                    'rgNumber' => '87654321',
                    'rgUf' => 'MG',
                    'cnhRegisterNumber' => '123456789',
                    'cnhSecurityNumber' => '654321',
                    'cnhUf' => 'MG',
                    'infractions' => [
                        ['code' => '003', 'date' => '2025-04-10', 'points' => 7, 'description' => 'Dirigir sob efeito de álcool'],
                    ],
                    'suspensions' => [
                        ['reason' => 'Dirigir embriagado', 'start_date' => '2025-05-01', 'end_date' => '2025-10-01'],
                    ],
                ]),
                'vehicle_data' => json_encode([
                    'plate' => 'XYZ9876',
                    'renavam' => '123456789',
                    'uf' => 'SP',
                    'restrictions' => [
                        ['type' => 'Renajud', 'start_date' => '2025-02-01', 'status' => 'Ativa'],
                    ],
                ]),
                'query_id' => $queryIds[2], // Associar ao terceiro registro em queries
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
