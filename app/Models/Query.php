<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;

    protected $fillable = [
        'enterprise_id',
        'type',
        'subtype',
        'value',
        'status',
    ];

    /**
     * Relacionamento com Research.
     */
    public function research()
    {
        return $this->hasOne(Research::class);
    }
}
