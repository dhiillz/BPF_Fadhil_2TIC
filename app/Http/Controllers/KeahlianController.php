<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use Illuminate\Http\Request;

class KeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataKeahlian'] = Keahlian::orderBy('id')->get();

        return view('admin.keahlian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.keahlian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_keahlian' => 'required|string|max:255',
            'tingkat_keahlian' => 'required|in:Rendah,Menengah,Tinggi',
        ]);

        Keahlian::create($validatedData);

        return redirect()->route('admin.keahlian.index')
            ->with('success', 'Keahlian berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataKeahlian'] = Keahlian::findOrFail($id);

        return view('admin.keahlian.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_keahlian' => 'required|string|max:255',
            'tingkat_keahlian' => 'required|in:Rendah,Menengah,Tinggi',
        ]);

        $keahlian = Keahlian::findOrFail($id);
        $keahlian->update($validatedData);

        return redirect()->route('admin.keahlian.index')
            ->with('success', 'Keahlian berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Keahlian::findOrFail($id)->delete();

        return redirect()->route('admin.keahlian.index')
            ->with('success', 'Keahlian berhasil dihapus!');
    }
}
