<?php

namespace App\Http\Controllers;

use App\Models\ProfilCv;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilCvController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        if (ProfilCv::query()->exists()) {
            return redirect()->route('cv.index')
                ->withErrors(['profil' => 'Profil CV sudah tersedia.'])
                ->withInput();
        }

        $validatedData = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'profesi' => ['required', 'string', 'max:255'],
            'tempat_tanggal_lahir' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:1000'],
            'sosial_media' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'pendidikan' => ['required', 'string', 'max:1000'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048', 'dimensions:max_width=3000,max_height=3000'],
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('profil-cv', 'public');

            if ($fotoPath === false) {
                return redirect()->route('cv.index')
                    ->withErrors(['foto' => 'Foto gagal disimpan.'])
                    ->withInput();
            }

            $validatedData['foto'] = $fotoPath;
        } else {
            unset($validatedData['foto']);
        }

        ProfilCv::create($validatedData);

        return redirect()->route('cv.index')->with('success', 'Profil berhasil ditambahkan!');
    }

    public function update(Request $request, ProfilCv $profilCv): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'profesi' => ['required', 'string', 'max:255'],
            'tempat_tanggal_lahir' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:1000'],
            'sosial_media' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'pendidikan' => ['required', 'string', 'max:1000'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048', 'dimensions:max_width=3000,max_height=3000'],
            'hapus_foto' => ['sometimes', 'boolean'],
        ]);

        $fotoLama = $profilCv->foto;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('profil-cv', 'public');

            if ($fotoPath === false) {
                return redirect()->route('cv.index')
                    ->withErrors(['foto' => 'Foto gagal disimpan.'])
                    ->withInput();
            }

            $validatedData['foto'] = $fotoPath;
        } elseif ($request->boolean('hapus_foto')) {
            $validatedData['foto'] = null;
        } else {
            unset($validatedData['foto']);
        }

        unset($validatedData['hapus_foto']);
        $profilCv->update($validatedData);

        if ($fotoLama && $fotoLama !== $profilCv->foto) {
            Storage::disk('public')->delete($fotoLama);
        }

        return redirect()->route('cv.index')->with('success', 'Profil berhasil diperbarui!');
    }

    public function destroy(ProfilCv $profilCv): RedirectResponse
    {
        $fotoPath = $profilCv->foto;
        $profilCv->delete();

        if ($fotoPath) {
            Storage::disk('public')->delete($fotoPath);
        }

        return redirect()->route('cv.index')->with('success', 'Profil berhasil dihapus!');
    }
}
