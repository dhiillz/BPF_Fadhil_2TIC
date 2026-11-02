<?php

namespace App\Http\Controllers;

use App\Models\PengalamanKerja;
use Illuminate\Http\Request;

class PengalamanKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataPengalamanKerja'] = PengalamanKerja::orderByDesc('tanggal_mulai')->get();

        return view('admin.pengalaman-kerja.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengalaman-kerja.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'posisi' => 'required|string|max:150',
            'perusahaan' => 'required|string|max:150',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable|string|max:5000',
        ]);

        PengalamanKerja::create($validatedData);

        return redirect()->route('admin.pengalaman-kerja.index')
            ->with('success', 'Pengalaman kerja berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataPengalamanKerja'] = PengalamanKerja::findOrFail($id);

        return view('admin.pengalaman-kerja.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'posisi' => 'required|string|max:150',
            'perusahaan' => 'required|string|max:150',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable|string|max:5000',
        ]);

        $pengalamanKerja = PengalamanKerja::findOrFail($id);
        $pengalamanKerja->update($validatedData);

        return redirect()->route('admin.pengalaman-kerja.index')
            ->with('success', 'Pengalaman kerja berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PengalamanKerja::findOrFail($id)->delete();

        return redirect()->route('admin.pengalaman-kerja.index')
            ->with('success', 'Pengalaman kerja berhasil dihapus!');
    }
}
