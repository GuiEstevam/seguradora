<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autonomous extends Model
{
    protected $fillable = [
        'flagProduct',
        'codCCD',
        'codCCT',
        'codCCV',
        'codPrecification',
        'cpf',
        'name',
        'motherName',
        'rgNumber',
        'rgUf',
        'cnhRegisterNumber',
        'cnhSecurityNumber',
        'cnhUf',
        'personFlagAntt',
        'vehiclePlate01',
        'vehicleRenavam01',
        'vehicleUf01',
        'vehicleOwnerDocument01',
        'vehicleRntrcNumber01',
        'vehicleFlagAntt01',
        'dProcessOnVehicle01',
        'vehiclePlate02',
        'vehicleRenavam02',
        'vehicleUf02',
        'vehicleOwnerDocument02',
        'vehicleRntrcNumber02',
        'vehicleFlagAntt02',
        'dProcessOnVehicle02',
        'vehiclePlate03',
        'vehicleRenavam03',
        'vehicleUf03',
        'vehicleOwnerDocument03',
        'vehicleRntrcNumber03',
        'vehicleFlagAntt03',
        'dProcessOnVehicle03',
        'vehiclePlate04',
        'vehicleRenavam04',
        'vehicleUf04',
        'vehicleOwnerDocument04',
        'vehicleRntrcNumber04',
        'vehicleFlagAntt04',
        'dProcessOnVehicle04',
        'query_id'
    ];
    use HasFactory;

    public function query_id()
    {
        return $this->belongsTo(Query::class);
    }
}
