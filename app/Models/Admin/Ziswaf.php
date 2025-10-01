<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Ziswaf extends Model
{
    protected $table = 'ziswaf';

    protected $fillable = [
        'nama',
        'jenis',
        'jumlah',
        'keterangan',
    ];
}
