<?php

namespace App\Models\Superadmin;

use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    protected $table = 'masjid'; // wajib, karena default Laravel = "masjids"
    protected $primaryKey = 'id_masjid';

    protected $fillable = [
        'nama_masjid',
        'alamat',
        'kontak',
        'email',
        'deskripsi',
    ];
}
