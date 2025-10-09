<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masjid_tenant extends Model
{
    use HasFactory;

    protected $table = 'masjids'; // atau 'masjid' jika tabelnya singular
    protected $fillable = [
        'name',
        'address',
        'geo_location',
        'phone',
        'email',
        'established_date'
    ];

    protected $casts = [
        'established_date' => 'date',
        'geo_location' => 'array',
    ];

    /**
     * Relasi: Masjid memiliki banyak User
     */
    public function users()
    {
        return $this->hasMany(User::class, 'masjid_id');
    }

    /**
     * Relasi: Masjid memiliki banyak Jamaah
     */
    public function jamaahs()
    {
        return $this->hasMany(Jamaah::class, 'masjid_id');
    }
}
