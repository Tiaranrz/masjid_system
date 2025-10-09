<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    use HasFactory;

    protected $table = 'jamaah'; // Sesuaikan nama tabel

    protected $fillable = [
        'tenant_id',
        'name',
        'email',
        'phone',
        'gender',
        'birth_date',
        'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    /**
     * Relasi: Jamaah milik satu Tenant
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
};
