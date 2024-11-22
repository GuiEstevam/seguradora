<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $table = 'researches'; // Certifique-se de que o nome da tabela está correto

    protected $fillable = [
        'type', // Pode ser 'aggregated', 'autonomous' ou 'fleet'
        'flagProduct',
        'codCCD',
        'codCCT',
        'codCCV',
        'codCCN',
        'codPrecification',
        'flagSpecialAnalysis',
        'cpf',
        'name',
        'motherName',
        'birthDate',
        'rgNumber',
        'rgUf',
        'cnhRegisterNumber',
        'cnhSecurityNumber',
        'cnhUf',
        'cnhBase64Document',
        'personFlagAntt',
        'vehicleFlagSpecialAnalysis01',
        'vehiclePlate01',
        'vehicleRenavam01',
        'vehicleUf01',
        'vehicleOwnerDocument01',
        'vehiclePossesionDocument01',
        'vehicleBase64Document01',
        'vehicleRntrcNumber01',
        'vehicleFlagAntt01',
        'dProcessOnVehicle01',
        'vehicleFlagSpecialAnalysis02',
        'vehiclePlate02',
        'vehicleRenavam02',
        'vehicleUf02',
        'vehicleOwnerDocument02',
        'vehiclePossesionDocument02',
        'vehicleBase64Document02',
        'vehicleRntrcNumber02',
        'vehicleFlagAntt02',
        'dProcessOnVehicle02',
        'vehicleFlagSpecialAnalysis03',
        'vehiclePlate03',
        'vehicleRenavam03',
        'vehicleUf03',
        'vehicleOwnerDocument03',
        'vehiclePossesionDocument03',
        'vehicleBase64Document03',
        'vehicleRntrcNumber03',
        'vehicleFlagAntt03',
        'dProcessOnVehicle03',
        'vehicleFlagSpecialAnalysis04',
        'vehiclePlate04',
        'vehicleRenavam04',
        'vehicleUf04',
        'vehicleOwnerDocument04',
        'vehiclePossesionDocument04',
        'vehicleBase64Document04',
        'vehicleRntrcNumber04',
        'vehicleFlagAntt04',
        'dProcessOnVehicle04',
        'profileCode',
        'regionOrigin',
        'regionDestiny',
        'query_id'
    ];

    public function query_id()
    {
        return $this->belongsTo(Query::class);
    }
}
