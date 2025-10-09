<?php
// app/Models/Inventory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';

    protected $fillable = [
        'tenant_id',
        'name',        // ← MASIH 'name'
        'category',
        'price',       // ← MASIH 'price'
        'quantity',    // ← MASIH 'quantity'
        'unit',
        'status',
        'location',
        'acquisition_date',
        'description'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
        'acquisition_date' => 'date'
    ];

    public function scopeForTenant($query, $tenantId)
    {
        return $query->where('tenant_id', $tenantId);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }
}
