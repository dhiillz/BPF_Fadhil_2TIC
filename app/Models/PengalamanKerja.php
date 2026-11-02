<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    protected $table = 'pengalaman_kerja_table_1122';

    protected $fillable = [
        'posisi',
        'perusahaan',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
    ];
}
