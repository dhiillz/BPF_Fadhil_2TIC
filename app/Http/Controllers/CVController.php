<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use App\Models\PengalamanKerja;
use App\Models\ProfilCv;

class CVController extends Controller
{
    public function index()
    {
        $data['profilCv'] = ProfilCv::query()->first();
        $data['dataKeahlian'] = Keahlian::orderBy('id')->get();
        $data['dataPengalamanKerja'] = PengalamanKerja::orderByDesc('tanggal_mulai')->get();

        return view('cv.index', $data);
    }
}
