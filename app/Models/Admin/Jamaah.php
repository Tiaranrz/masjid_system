<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Gender;

class Jamaah extends Model
{
    // Nama tabel di database
    protected $table = 'jamaah';

    // Primary Key non-default
    protected $primaryKey = 'id_jamaah';

    // Non-default Primary Key sering kali bukan auto-increment jika diisi manual
    public $incrementing = true;

    // Tentukan kolom mana yang bisa diisi (Fillable)
    protected $fillable = [
        'full_name', 'email', 'address', 'phone_number',
        'gender_id', 'join_date', 'id_masjid'
    ];

    // Tentukan kolom tanggal jika Anda menggunakannya (misalnya join_date)
    protected $dates = ['join_date'];

    // Definisikan Relasi
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'id'); // Sesuaikan foreign key
    }

    public function masjid()
    {
        return $this->belongsTo(Masjid::class, 'id_masjid', 'id_masjid'); // Sesuaikan foreign key
    }
}
