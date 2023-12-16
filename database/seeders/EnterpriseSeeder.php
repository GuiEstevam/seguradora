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
            'name' => 'SEGURADORA TESTE',
            'cnpj' => '000000000',
            'email' => 'user@teste.com',
        ]);
    }
}
