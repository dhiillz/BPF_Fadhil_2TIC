@extends('layouts.admin.app')


@section('content')
    <!-- Page Header -->
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('user.index') }}">User</a>
                </li>
                <li class="breadcrumb-item active">
                    Edit Data
                </li>
            </ol>
        </nav>


        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit User</h1>
                <p class="mb-0">Form untuk mengubah data user.</p>
            </div>


            <div>
                <a href="{{ route('user.index') }}" class="btn btn-primary">
                    Kembali
                </a>
            </div>
        </div>
    </div>


    <!-- Form Edit User -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Data gagal divalidasi!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif


                    <form action="{{ route('user.update', $dataUser->id) }}" method="POST">
                        @csrf
                        @method('PUT')


                        <div class="row mb-4">
                            <div class="col-lg-6 col-sm-12">


                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Name
                                    </label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ old('name', $dataUser->name) }}" required>
                                </div>


                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        Email
                                    </label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ old('email', $dataUser->email) }}" required>
                                </div>


                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        Password Baru
                                    </label>
                                    <input type="password" id="password" name="password" class="form-control">
                                    <small class="text-gray">
                                        Kosongkan jika tidak ingin mengganti password.
                                    </small>
                                </div>


                                <!-- Confirm Password -->
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">
                                        Confirm Password
                                    </label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control">
                                </div>


                                <!-- Buttons -->
                                <div>
                                    <button type="submit" class="btn btn-info">
                                        Simpan Perubahan
                                    </button>


                                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">
                                        Batal
                                    </a>
                                </div>


                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
