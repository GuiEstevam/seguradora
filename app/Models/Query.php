<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;
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
    public function aggregate()
    {
        return $this->hasOne(Aggregate::class);
    }
    public function autonomous()
    {
        return $this->hasOne(Autonomous::class);
    }
    public function fleet()
    {
        return $this->hasOne(Fleet::class);
    }
    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }
}
