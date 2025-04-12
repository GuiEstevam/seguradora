<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueryValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'enterprise_id',
        'individual_driver_price',
        'individual_vehicle_price',
        'unified_price',
        'validity_days',
        'individual_driver_recurring',
        'individual_vehicle_recurring',
        'unified_recurring',
        'description',
        'status',
    ];

    /**
     * Relacionamento com Enterprise (se necessário).
     */
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
}
