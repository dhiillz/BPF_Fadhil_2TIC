<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilCv extends Model
{
    protected $fillable = [
        'nama',
        'profesi',
        'tempat_tanggal_lahir',
        'alamat',
        'sosial_media',
        'email',
        'pendidikan',
        'foto',
    ];
}
