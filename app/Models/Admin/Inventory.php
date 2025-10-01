<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    // Tentukan nama tabel. Gunakan 'inventory' jika itu nama tabel di DB Anda.
    protected $table = 'inventory';

    // Kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'name',
        'category',
        'price',
        'quantity',
        'unit',
        'status',
        'location',
        'acquisition_date',
        'description',
        // Tambahkan kolom lain dari migrasi Anda
    ];

    // ... (Lanjutkan dengan casts atau relasi)
}
