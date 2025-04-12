<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $table = 'researches';

    protected $fillable = [
        'type',
        'driver_data',
        'vehicle_data',
        'query_id',
    ];

    protected $casts = [
        'driver_data' => 'array',
        'vehicle_data' => 'array',
    ];

    /**
     * Relacionamento com Query.
     */
    public function queryRelation()
    {
        return $this->belongsTo(Query::class);
    }

    /**
     * Obter dados do motorista.
     */
    public function getDriverDataAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Obter dados do veículo.
     */
    public function getVehicleDataAttribute($value)
    {
        return json_decode($value, true);
    }
}
