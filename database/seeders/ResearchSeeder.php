<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Research;
use App\Models\Query;

class ResearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criar pesquisas do tipo 'aggregated'
        for ($i = 1; $i <= 2; $i++) {
            $query = Query::create([
                'type' => 'Aggregate',
                'status' => 'pending',
                'enterprise_id' => 1, // Substitua pelo ID da empresa apropriada
                'user_id' => 1, // Substitua pelo ID do usuário apropriado
                'value' => 100.00,
            ]);

            Research::create([
                'type' => 'aggregated',
                'flagProduct' => '1',
                'codCCD' => '0',
                'codCCT' => '0',
                'codCCV' => '0',
                'codCCN' => '0',
                'codPrecification' => '1',
                'flagSpecialAnalysis' => '0',
                'cpf' => '12345678901',
                'name' => 'Nome Agregado ' . $i,
                'motherName' => 'Mãe Agregado ' . $i,
                'birthDate' => '1990-01-01',
                'rgNumber' => '1234567',
                'rgUf' => 'SP',
                'cnhRegisterNumber' => '1234567890',
                'cnhSecurityNumber' => '1234567890',
                'cnhUf' => 'SP',
                'cnhBase64Document' => null,
                'personFlagAntt' => '0',
                'vehiclePlate01' => 'ABC1231',
                'vehicleRenavam01' => '1234567890',
                'vehicleUf01' => 'SP',
                'vehicleOwnerDocument01' => '1234567890',
                'vehiclePossesionDocument01' => '1234567890',
                'vehicleBase64Document01' => null,
                'vehicleRntrcNumber01' => '1234567890',
                'vehicleFlagAntt01' => '0',
                'dProcessOnVehicle01' => '0',
                'vehiclePlate02' => 'ABC1232',
                'vehicleRenavam02' => '1234567890',
                'vehicleUf02' => 'SP',
                'vehicleOwnerDocument02' => '1234567890',
                'vehiclePossesionDocument02' => '1234567890',
                'vehicleBase64Document02' => null,
                'vehicleRntrcNumber02' => '1234567890',
                'vehicleFlagAntt02' => '0',
                'dProcessOnVehicle02' => '0',
                'vehiclePlate03' => 'ABC1233',
                'vehicleRenavam03' => '1234567890',
                'vehicleUf03' => 'SP',
                'vehicleOwnerDocument03' => '1234567890',
                'vehiclePossesionDocument03' => '1234567890',
                'vehicleBase64Document03' => null,
                'vehicleRntrcNumber03' => '1234567890',
                'vehicleFlagAntt03' => '0',
                'dProcessOnVehicle03' => '0',
                'vehiclePlate04' => 'ABC1234',
                'vehicleRenavam04' => '1234567890',
                'vehicleUf04' => 'SP',
                'vehicleOwnerDocument04' => '1234567890',
                'vehiclePossesionDocument04' => '1234567890',
                'vehicleBase64Document04' => null,
                'vehicleRntrcNumber04' => '1234567890',
                'vehicleFlagAntt04' => '0',
                'dProcessOnVehicle04' => '0',
                'query_id' => $query->id,
            ]);
        }

        // Criar pesquisas do tipo 'autonomous'
        for ($i = 1; $i <= 2; $i++) {
            $query = Query::create([
                'type' => 'Autonomous',
                'status' => 'pending',
                'enterprise_id' => 1, // Substitua pelo ID da empresa apropriada
                'user_id' => 1, // Substitua pelo ID do usuário apropriado
                'value' => 100.00,
            ]);

            Research::create([
                'type' => 'autonomous',
                'flagProduct' => '1',
                'codCCD' => '0',
                'codCCT' => '0',
                'codCCV' => '0',
                'codCCN' => '0',
                'codPrecification' => '1',
                'flagSpecialAnalysis' => '0',
                'cpf' => '12345678901',
                'name' => 'Nome Autônomo ' . $i,
                'motherName' => 'Mãe Autônomo ' . $i,
                'birthDate' => '1990-01-01',
                'rgNumber' => '1234567',
                'rgUf' => 'SP',
                'cnhRegisterNumber' => '1234567890',
                'cnhSecurityNumber' => '1234567890',
                'cnhUf' => 'SP',
                'cnhBase64Document' => null,
                'personFlagAntt' => '0',
                'vehiclePlate01' => 'DEF4561',
                'vehicleRenavam01' => '1234567890',
                'vehicleUf01' => 'SP',
                'vehicleOwnerDocument01' => '1234567890',
                'vehiclePossesionDocument01' => '1234567890',
                'vehicleBase64Document01' => null,
                'vehicleRntrcNumber01' => '1234567890',
                'vehicleFlagAntt01' => '0',
                'dProcessOnVehicle01' => '0',
                'vehiclePlate02' => 'DEF4562',
                'vehicleRenavam02' => '1234567890',
                'vehicleUf02' => 'SP',
                'vehicleOwnerDocument02' => '1234567890',
                'vehiclePossesionDocument02' => '1234567890',
                'vehicleBase64Document02' => null,
                'vehicleRntrcNumber02' => '1234567890',
                'vehicleFlagAntt02' => '0',
                'dProcessOnVehicle02' => '0',
                'vehiclePlate03' => 'DEF4563',
                'vehicleRenavam03' => '1234567890',
                'vehicleUf03' => 'SP',
                'vehicleOwnerDocument03' => '1234567890',
                'vehiclePossesionDocument03' => '1234567890',
                'vehicleBase64Document03' => null,
                'vehicleRntrcNumber03' => '1234567890',
                'vehicleFlagAntt03' => '0',
                'dProcessOnVehicle03' => '0',
                'vehiclePlate04' => 'DEF4564',
                'vehicleRenavam04' => '1234567890',
                'vehicleUf04' => 'SP',
                'vehicleOwnerDocument04' => '1234567890',
                'vehiclePossesionDocument04' => '1234567890',
                'vehicleBase64Document04' => null,
                'vehicleRntrcNumber04' => '1234567890',
                'vehicleFlagAntt04' => '0',
                'dProcessOnVehicle04' => '0',
                'query_id' => $query->id,
            ]);
        }

        // Criar pesquisas do tipo 'fleet'
        for ($i = 1; $i <= 2; $i++) {
            $query = Query::create([
                'type' => 'Fleet',
                'status' => 'pending',
                'enterprise_id' => 1, // Substitua pelo ID da empresa apropriada
                'user_id' => 1, // Substitua pelo ID do usuário apropriado
                'value' => 100.00,
            ]);

            Research::create([
                'type' => 'fleet',
                'flagProduct' => '1',
                'codCCD' => '0',
                'codCCT' => '0',
                'codCCV' => '0',
                'codCCN' => '0',
                'codPrecification' => '1',
                'flagSpecialAnalysis' => '0',
                'cpf' => '12345678901',
                'name' => 'Nome Frota ' . $i,
                'motherName' => 'Mãe Frota ' . $i,
                'birthDate' => '1990-01-01',
                'rgNumber' => '1234567',
                'rgUf' => 'SP',
                'cnhRegisterNumber' => '1234567890',
                'cnhSecurityNumber' => '1234567890',
                'cnhUf' => 'SP',
                'cnhBase64Document' => null,
                'personFlagAntt' => '0',
                'vehiclePlate01' => 'GHI7891',
                'vehicleRenavam01' => '1234567890',
                'vehicleUf01' => 'SP',
                'vehicleOwnerDocument01' => '1234567890',
                'vehiclePossesionDocument01' => '1234567890',
                'vehicleBase64Document01' => null,
                'vehicleRntrcNumber01' => '1234567890',
                'vehicleFlagAntt01' => '0',
                'dProcessOnVehicle01' => '0',
                'vehiclePlate02' => 'GHI7892',
                'vehicleRenavam02' => '1234567890',
                'vehicleUf02' => 'SP',
                'vehicleOwnerDocument02' => '1234567890',
                'vehiclePossesionDocument02' => '1234567890',
                'vehicleBase64Document02' => null,
                'vehicleRntrcNumber02' => '1234567890',
                'vehicleFlagAntt02' => '0',
                'dProcessOnVehicle02' => '0',
                'vehiclePlate03' => 'GHI7893',
                'vehicleRenavam03' => '1234567890',
                'vehicleUf03' => 'SP',
                'vehicleOwnerDocument03' => '1234567890',
                'vehiclePossesionDocument03' => '1234567890',
                'vehicleBase64Document03' => null,
                'vehicleRntrcNumber03' => '1234567890',
                'vehicleFlagAntt03' => '0',
                'dProcessOnVehicle03' => '0',
                'vehiclePlate04' => 'GHI7894',
                'vehicleRenavam04' => '1234567890',
                'vehicleUf04' => 'SP',
                'vehicleOwnerDocument04' => '1234567890',
                'vehiclePossesionDocument04' => '1234567890',
                'vehicleBase64Document04' => null,
                'vehicleRntrcNumber04' => '1234567890',
                'vehicleFlagAntt04' => '0',
                'dProcessOnVehicle04' => '0',
                'query_id' => $query->id,
            ]);
        }
    }
}
