<?php

namespace Database\Seeders;

use App\Models\Enterprise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnterpriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Enterprise::create([
            'name' => 'Nome da Empresa',
            'cnpj' => '12345678901234', // Substitua pelo CNPJ real
            'state_registration' => '123456789',
            'address' => 'Rua Exemplo',
            'number' => '123',
            'uf' => 'SP',
            'complement' => 'Sala 301',
            'cep' => '12345-678',
            'district' => 'Bairro Exemplo',
            'city' => 'Cidade Exemplo',
        ]);
    }
}
