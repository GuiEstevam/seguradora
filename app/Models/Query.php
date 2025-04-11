<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Query extends Model
{
    use HasFactory;

    protected $fillable = [
        'enterprise_id',
        'type',
        'status',
        'is_recurring',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }

    public function driverLicense()
    {
        return $this->hasOne(DriverLicense::class);
    }

    public function research()
    {
        return $this->hasOne(Research::class);
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }

    public function queryValue()
    {
        return $this->hasOne(QueryValue::class);
    }

    public function isRecurring()
    {
        return $this->is_recurring;
    }

    public function calculateNextExecutionDate()
    {
        $now = Carbon::now();
        $nextExecutionDate = $now;

        switch ($this->type) {
            case 'autonomous':
                $nextExecutionDate = $nextExecutionDate->addDays($this->queryValue->autonomous_validity);
                break;
            case 'aggregated':
                $nextExecutionDate = $nextExecutionDate->addDays($this->queryValue->aggregated_validity);
                break;
            case 'fleet':
                $nextExecutionDate = $nextExecutionDate->addDays($this->queryValue->fleet_validity);
                break;
        }

        return $nextExecutionDate;
    }
}
