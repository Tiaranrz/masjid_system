<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'masjids';

    // Kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'name_masjid',
        'slug',
        'address',
        'coordinates',
        'tahun_sk',
        'luas_bangunan',
        'luas_tanah',
        'description',
        'contact_person',
        'phone',
        'email',
        'instagram_link',
        'facebook_link',
        'management_structure',
        'status', // Digunakan untuk status verifikasi (e.g., active, pending)
        'template_style', // Digunakan untuk pengaturan sistem
    ];

    // Tentukan tipe data untuk kolom tertentu
    protected $casts = [
        'luas_bangunan' => 'decimal:2',
        'luas_tanah' => 'decimal:2',
    ];

    // Relasi: Jika Anda ingin melihat user (admin) mana yang terhubung ke masjid ini
    public function users()
    {
        // Asumsi kolom FK di tabel users adalah 'id_masjid'
        return $this->hasMany(\App\Models\User::class, 'id_masjid');
    }
}
