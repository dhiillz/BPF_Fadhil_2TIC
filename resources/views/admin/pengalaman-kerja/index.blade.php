@extends('admin.layouts.cv')

@section('title', 'Pengalaman Kerja')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 class="h4 mb-1">Pengalaman Kerja</h1>
            <p class="text-gray-600 mb-0">Kelola pengalaman kerja yang ditampilkan pada CV.</p>
        </div>
        <a href="{{ route('admin.pengalaman-kerja.create') }}" class="btn btn-primary">Tambah Pengalaman</a>
    </div>

    <div class="card border-0 shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-items-center mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Posisi / Perusahaan</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPengalamanKerja as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $item->posisi }}</strong><br>
                                    <span class="text-gray-600">{{ $item->perusahaan }}</span>
                                </td>
                                <td>{{ $item->tanggal_mulai }} - {{ $item->tanggal_selesai ?: 'Sekarang' }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 90) }}</td>
                                <td class="text-end text-nowrap">
                                    <a href="{{ route('admin.pengalaman-kerja.edit', $item->id) }}"
                                        class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('admin.pengalaman-kerja.destroy', $item->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Hapus pengalaman kerja ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">Belum ada data pengalaman kerja.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
