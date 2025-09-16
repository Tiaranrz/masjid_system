<?php

namespace App\Models\Superadmin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
    'name',
    'email',
    'phone_number',
    'password',
    'role',
    'gender_id',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relasi ke Role
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id_role');
    }

    /**
     * Relasi ke Masjid
     */
    public function masjid(): BelongsTo
    {
        return $this->belongsTo(Masjid::class, 'id_masjid', 'id');
    }
}
