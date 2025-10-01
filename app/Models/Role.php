<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id_role';

    protected $fillable = ['nama_role'];

    public function users()
    {
        return $this->belongsToMany(user::class, 'user_roles', 'id_role', 'id_user_sistem');
        return $this->role->permissions->contains('name', $permissionName);
    }
}
