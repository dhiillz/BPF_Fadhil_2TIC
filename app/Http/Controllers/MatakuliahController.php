<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        return "Menampilkan data matakuliah";
    }

    public function create()
    {
        return "Menampilkan form tambah data matakuliah";
    }

    public function store(Request $request)
    {
        return "Menyimpan data matakuliah";
    }

    public function show($kode = null)
    {
        if ($kode) {
            return "Anda mengakses matakuliah " . $kode;
        }
        return "Masukkan kode matakuliah!";
    }

    public function edit($id = null )
    {
        return "Menampilkan form edit data matakuliah";
    }

    public function update(Request $request, string $id)
    {
        return "Mengubah data matakuliah";
    }

    public function destroy(string $id)
    {
        return "Menghapus data matakuliah";
    }
}
