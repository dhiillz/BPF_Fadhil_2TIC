@extends('admin.layouts.cv')

@section('title', 'Tambah Pengalaman Kerja')

@section('content')
    <div class="py-2 mb-3">
        <h1 class="h4 mb-1">Tambah Pengalaman Kerja</h1>
        <p class="text-gray-600 mb-0">Masukkan pengalaman kerja untuk CV.</p>
    </div>

    <div class="card border-0 shadow">
        <div class="card-body">
            <form action="{{ route('admin.pengalaman-kerja.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="posisi" class="form-label">Posisi</label>
                    <input type="text" id="posisi" name="posisi" class="form-control" value="{{ old('posisi') }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="perusahaan" class="form-label">Perusahaan</label>
                    <input type="text" id="perusahaan" name="perusahaan" class="form-control"
                        value="{{ old('perusahaan') }}" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control"
                            value="{{ old('tanggal_mulai') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="form-control"
                            value="{{ old('tanggal_selesai') }}">
                        <small class="form-text text-gray-600">Kosongkan jika masih bekerja di sini.</small>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
                </div>
                <a href="{{ route('admin.pengalaman-kerja.index') }}" class="btn btn-outline-gray-600">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
