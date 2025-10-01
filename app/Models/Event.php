<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'judul_event',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'event_detime',
        'lokasi',
        'status',
        'masjid',
    ];


    }

