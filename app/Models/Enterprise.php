<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    protected $guarded = [];

    public $timestamps = true;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
