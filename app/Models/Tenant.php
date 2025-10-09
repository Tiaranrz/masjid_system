<?php
// app/Models/Tenant.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'address',
        'geo_location',
        'phone',
        'email',
        'established_date',
        'status',
        'data'
    ];

    protected $casts = [
        'established_date' => 'date',
        'data' => 'array',
        'status' => 'string'
    ];

    // Relasi ke events
    public function events()
    {
        return $this->hasMany(Event::class, 'tenant_id', 'id');
    }
}
