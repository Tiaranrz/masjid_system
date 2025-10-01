<?php

namespace App\Models\Superadmin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    // Asumsi tabel pivot (role_permission) akan dibuat terpisah
    // Relasi many-to-many ke Role
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission', 'permission_id', 'role_id');
    }
}
