<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Keuangan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'keuangan';

    // Kolom yang bisa diisi melalui mass assignment
    protected $fillable = [
        'type',                // tipe transaksi (misal: pemasukan/pengeluaran)
        'jenis',               // jenis transaksi (misal: donasi, ziswaf)
        'nama_donatur',        // nama donatur
        'jumlah',              // nominal transaksi
        'tanggal',             // tanggal transaksi
        'metode_pembayaran',   // metode pembayaran (tunai/transfer)
        'keterangan',          // deskripsi tambahan
        'amount',              // duplikat jumlah (jika digunakan)
    ];

    // Kolom bertipe tanggal
    protected $dates = [
        'tanggal',
        'created_at',
        'updated_at',
    ];

    /**
     * Akses custom: Format jumlah sebagai mata uang Rupiah.
     */
    public function getFormattedJumlahAttribute()
    {
        return 'Rp ' . number_format($this->jumlah, 0, ',', '.');
    }

    /**
     * Akses custom: Format amount (jika digunakan).
     */
    public function getFormattedAmountAttribute()
    {
        if ($this->amount === null) {
            return null;
        }
        return 'Rp ' . number_format($this->amount, 0, ',', '.');
    }

    /**
     * Scope: filter berdasarkan jenis transaksi (donasi atau ziswaf).
     */
    public function scopeJenis($query, $jenis)
    {
        return $query->where('jenis', $jenis);
    }

    /**
     * Scope: filter berdasarkan rentang tanggal.
     */
    public function scopeBetweenDates($query, $start, $end)
    {
        return $query->whereBetween('tanggal', [
            Carbon::parse($start)->startOfDay(),
            Carbon::parse($end)->endOfDay()
        ]);
    }

    /**
     * Scope: filter berdasarkan metode pembayaran.
     */
    public function scopeMetode($query, $metode)
    {
        return $query->where('metode_pembayaran', $metode);
    }

    /**
     * Helper untuk cek apakah transaksi ini donasi.
     */
    public function isDonasi()
    {
        return strtolower($this->jenis) === 'donasi';
    }

    /**
     * Helper untuk cek apakah transaksi ini ZISWAF.
     */
    public function isZiswaf()
    {
        return strtolower($this->jenis) === 'ziswaf';
    }
}
