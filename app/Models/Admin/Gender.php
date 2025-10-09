<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Jamaah;
use App\Models\Admin\Masjid;

class Gender extends Model
{
    use HasFactory;

    // Nama tabel default Laravel adalah 'genders', jadi tidak perlu didefinisikan secara eksplisit

    /**
     * Tentukan kolom yang bisa diisi (mass assignable).
     * Jika Anda memiliki kolom 'name' untuk menyimpan nama jenis kelamin.
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Definisikan relasi ke Model Jamaah.
     * Satu Gender dimiliki oleh banyak Jamaah.
     */
    public function jamaahs()
    {
        // Asumsi Model Jamaah ada dan menggunakan foreign key 'gender_id'
        return $this->hasMany(Jamaah::class, 'gender_id');
    }
}
