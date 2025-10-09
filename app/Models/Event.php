<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory; // HANYA HasFactory, tanpa SoftDeletes

    protected $fillable = [
        'tenant_id',
        'judul_event',
        'description',
        'event_date',
        'location',
        'status',
        'masjid',
    ];

    public function scopeForTenant($query, $tenantId)
    {
        return $query->where('tenant_id', $tenantId);
    }
}
