<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Event; // ← TAMBAHKAN INI

class EventSeeder extends Seeder
{
    public function run() // ← PERBAIKI: kurung buka di sini
    {
        $events = [];

        // Data untuk masjid1
        $events[] = [
            'tenant_id' => 'masjid1',
            'judul_event' => 'Sholat Jumat Berjamaah',
            'description' => 'Sholat Jumat berjamaah dengan khotbah oleh Ust. Ahmad',
            'event_date' => now()->addDays(2)->setHour(12)->setMinute(0),
            'location' => 'Masjid Al-Ikhlas',
            'status' => 'upcoming',
            'masjid' => 'Masjid Al-Ikhlas',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Data untuk masjid2
        $events[] = [
            'tenant_id' => 'masjid2',
            'judul_event' => 'Pengajian Rutin',
            'description' => 'Pengajian mingguan masjid An-Nur',
            'event_date' => now()->addDays(3)->setHour(19)->setMinute(0),
            'location' => 'Masjid An-Nur',
            'status' => 'upcoming',
            'masjid' => 'Masjid An-Nur',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Tambahkan lebih banyak data untuk testing
        $events[] = [
            'tenant_id' => 'masjid1',
            'judul_event' => 'Kerja Bakti Masjid',
            'description' => 'Membersihkan lingkungan masjid bersama jamaah',
            'event_date' => now()->addDays(5)->setHour(8)->setMinute(0),
            'location' => 'Halaman Masjid Al-Ikhlas',
            'status' => 'upcoming',
            'masjid' => 'Masjid Al-Ikhlas',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $events[] = [
            'tenant_id' => 'masjid2',
            'judul_event' => 'Santunan Anak Yatim',
            'description' => 'Pemberian santunan untuk anak yatim dan dhuafa',
            'event_date' => now()->addDays(7)->setHour(10)->setMinute(0),
            'location' => 'Aula Masjid An-Nur',
            'status' => 'upcoming',
            'masjid' => 'Masjid An-Nur',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Event::insert($events); // ← PASTIKAN menggunakan Model
    }
}
