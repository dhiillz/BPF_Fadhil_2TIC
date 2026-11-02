<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    protected $table = 'keahlian_table_1122';

    protected $fillable = [
        'nama_keahlian',
        'tingkat_keahlian',
    ];
}
