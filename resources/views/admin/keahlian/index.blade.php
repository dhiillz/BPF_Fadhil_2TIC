@extends('admin.layouts.cv')

@section('title', 'Keahlian')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 class="h4 mb-1">Data Keahlian</h1>
            <p class="text-gray-600 mb-0">Kelola keahlian yang ditampilkan pada CV.</p>
        </div>
        <a href="{{ route('admin.keahlian.create') }}" class="btn btn-primary">Tambah Keahlian</a>
    </div>

    <div class="card border-0 shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-items-center mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Keahlian</th>
                            <th scope="col">Tingkat</th>
                            <th scope="col" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataKeahlian as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_keahlian }}</td>
                                <td>{{ $item->tingkat_keahlian }}</td>
                                <td class="text-end text-nowrap">
                                    <a href="{{ route('admin.keahlian.edit', $item->id) }}"
                                        class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('admin.keahlian.destroy', $item->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Hapus keahlian ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">Belum ada data keahlian.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
