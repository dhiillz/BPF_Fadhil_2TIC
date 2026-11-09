<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Admin CV</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/volt.css') }}">
</head>

<body class="bg-gray-100">
    <div class="container-fluid">
        <div class="row">
            <aside class="col-lg-2 d-none d-lg-block bg-gray-800 min-vh-100 px-3 py-4">
                <a href="{{ route('dashboard') }}" class="text-white fw-bold text-decoration-none">Admin CV</a>
                <ul class="nav flex-column mt-4">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.keahlian.index') }}">Keahlian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.pengalaman-kerja.index') }}">Pengalaman
                            Kerja</a>
                    </li>
                    <li class="nav-item mt-3">
                        <a class="nav-link text-white-50" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                </ul>
            </aside>

            <main class="col-lg-10 px-3 px-md-4 py-4">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('cv.index') }}" target="_blank" rel="noopener"
                        class="btn btn-outline-primary btn-sm">
                        Lihat CV
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Data belum valid.</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
