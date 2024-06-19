<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueryValue extends Model
{
    protected $filliable = [
        'driverLicense',
        'veichile',
        'face',
        'process',
        'description',
        'status',
        'deactivated_at',
        'start_date',
        'end_date',
    ];

    use HasFactory;

    protected $casts = [
        'deactivated_at' => 'datetime',
    ];

    protected $dates = ['date'];

    protected $guarded = [];

    public $timestamps = true;

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
}
