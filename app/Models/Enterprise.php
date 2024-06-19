<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enterprise extends Model
{
    use HasFactory;

    protected $casts = [
        'deactivated_at' => 'datetime',
    ];

    protected $dates = ['date'];

    protected $guarded = [];

    public $timestamps = true;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function responsibleUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function queryValues()
    {
        return $this->hasOne(QueryValue::class);
    }
    public function queries()
    {
        return $this->hasMany(Query::class);
    }
}
