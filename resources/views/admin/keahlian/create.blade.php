@extends('admin.layouts.cv')

@section('title', 'Tambah Keahlian')

@section('content')
    <div class="py-2 mb-3">
        <h1 class="h4 mb-1">Tambah Keahlian</h1>
        <p class="text-gray-600 mb-0">Masukkan keahlian baru untuk CV.</p>
    </div>

    <div class="card border-0 shadow">
        <div class="card-body">
            <form action="{{ route('admin.keahlian.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_keahlian" class="form-label">Nama Keahlian</label>
                    <input type="text" id="nama_keahlian" name="nama_keahlian" class="form-control"
                        value="{{ old('nama_keahlian') }}" required>
                </div>
                <div class="mb-4">
                    <label for="tingkat_keahlian" class="form-label">Tingkat Keahlian</label>
                    <select id="tingkat_keahlian" name="tingkat_keahlian" class="form-select" required>
                        <option value="" disabled @selected(old('tingkat_keahlian') === null)>Pilih tingkat keahlian</option>
                        <option value="Rendah" @selected(strtolower(old('tingkat_keahlian', '')) === 'rendah')>Rendah</option>
                        <option value="Menengah" @selected(strtolower(old('tingkat_keahlian', '')) === 'menengah')>Menengah</option>
                        <option value="Tinggi" @selected(strtolower(old('tingkat_keahlian', '')) === 'tinggi')>Tinggi</option>
                    </select>
                </div>
                <a href="{{ route('admin.keahlian.index') }}" class="btn btn-outline-gray-600">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
