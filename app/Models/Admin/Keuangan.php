<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;  // <-- PERBAIKAN: Impor Model User agar bisa digunakan tanpa backslash

class Keuangan extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit (kebiasaan baik)
    protected $table = 'keuangan';

    // Kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'type',              // 'donasi' atau 'ziswaf'
        'description',       // Keterangan transaksi
        'amount',            // Jumlah uang
        'transaction_date',  // Tanggal transaksi
        'recorded_by_user_id', // FK ke user yang mencatat
    ];

    // Tentukan tipe data untuk kolom tertentu (casting)
    protected $casts = [
        'amount' => 'decimal:2',
        'transaction_date' => 'date',
    ];

    // --- Relasi ---

    /**
     * Relasi ke user yang mencatat transaksi.
     */
    public function recordedBy(): BelongsTo
    {
        // Menggunakan User::class karena sudah diimpor, lebih rapi daripada \App\Models\User::class
        return $this->belongsTo(User::class, 'recorded_by_user_id');
    }
}
