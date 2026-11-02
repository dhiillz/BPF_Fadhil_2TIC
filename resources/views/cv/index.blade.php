<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curriculum Vitae</title>
    <style>
        :root {
            color-scheme: light;
            --cv-blue: #17377f;
            --cv-ink: #202124;
            --cv-muted: #59616f;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #edf0f5;
            color: var(--cv-ink);
            font-family: "Century Gothic", "Aptos", sans-serif;
            line-height: 1.65;
        }

        .cv-sheet {
            width: min(100%, 900px);
            min-height: 1100px;
            margin: 32px auto;
            background: #fff;
            box-shadow: 0 12px 40px rgb(22 37 66 / 12%);
        }

        .cv-header {
            min-height: 220px;
            padding: 38px 9%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 28px;
            color: #fff;
            background: var(--cv-blue);
        }

        .cv-header h1 {
            margin: 0;
            font-size: clamp(28px, 5vw, 42px);
            line-height: 1.15;
            font-weight: 700;
        }

        .cv-header p {
            margin: 18px 0 0;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 5px;
            text-transform: uppercase;
        }

        .cv-avatar {
            width: 140px;
            aspect-ratio: 1;
            flex: 0 0 auto;
            display: grid;
            place-items: center;
            overflow: hidden;
            border: 5px solid #fff;
            border-radius: 50%;
            background: #dce5f4;
            color: var(--cv-blue);
            font-size: 36px;
            font-weight: 700;
        }

        .cv-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cv-content {
            padding: 38px 9% 64px;
        }

        .profile-current-photo {
            width: 84px;
            height: 84px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-photo-delete {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 8px;
            color: #8c2525;
            font-size: 13px;
        }

        .profile-photo-delete input {
            width: auto;
        }

        .cv-section {
            margin: 0 0 34px;
        }

        .cv-section h2 {
            width: fit-content;
            min-width: 220px;
            margin: 0 0 14px;
            padding: 0 0 5px;
            border-bottom: 3px solid var(--cv-blue);
            color: var(--cv-blue);
            font-size: 19px;
            line-height: 1.4;
            text-transform: uppercase;
        }

        .personal-data {
            display: grid;
            grid-template-columns: minmax(140px, 190px) 12px 1fr;
            column-gap: 12px;
            row-gap: 4px;
        }

        .personal-data .label {
            color: var(--cv-muted);
        }

        .cv-list {
            margin: 0;
            padding-left: 25px;
        }

        .cv-list li {
            margin: 3px 0;
        }

        .experience-item {
            margin-bottom: 14px;
        }

        .experience-item h3 {
            margin: 0;
            font-size: 16px;
        }

        .experience-meta {
            color: var(--cv-muted);
            font-size: 14px;
        }

        .experience-item p {
            margin: 5px 0 0;
            white-space: pre-line;
        }

        .empty-copy {
            color: var(--cv-muted);
            font-style: italic;
        }

        .cv-admin-link {
            position: fixed;
            right: 16px;
            bottom: 16px;
            display: flex;
            gap: 8px;
        }

        .cv-admin-link a,
        .cv-admin-link button {
            padding: 9px 13px;
            border: 0;
            border-radius: 4px;
            background: var(--cv-blue);
            color: #fff;
            font-size: 13px;
            text-decoration: none;
            font: inherit;
            cursor: pointer;
        }

        .cv-alert {
            margin: 0 0 20px;
            padding: 10px 14px;
            border: 1px solid #b7dfc4;
            border-radius: 4px;
            background: #e8f5ec;
            color: #205b32;
        }

        .cv-alert-error {
            border-color: #efb4b4;
            background: #fff0f0;
            color: #8c2525;
        }

        .profile-dialog {
            width: min(620px, calc(100vw - 32px));
            max-height: min(90vh, 900px);
            padding: 24px;
            overflow-y: auto;
            border: 0;
            border-radius: 6px;
            color: var(--cv-ink);
            box-shadow: 0 20px 60px rgb(22 37 66 / 28%);
        }

        .profile-dialog::backdrop {
            background: rgb(16 28 48 / 55%);
        }

        .profile-dialog-header,
        .profile-dialog-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .profile-dialog-header {
            margin-bottom: 18px;
        }

        .profile-dialog-header h2 {
            margin: 0;
            color: var(--cv-blue);
            font-size: 21px;
        }

        .profile-dialog-close {
            border: 0;
            background: transparent;
            color: var(--cv-muted);
            font-size: 14px;
            cursor: pointer;
        }

        .profile-form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .profile-field {
            display: grid;
            gap: 5px;
        }

        .profile-field-wide {
            grid-column: 1 / -1;
        }

        .profile-field label {
            font-size: 13px;
            font-weight: 700;
        }

        .profile-field input,
        .profile-field textarea {
            width: 100%;
            padding: 9px 10px;
            border: 1px solid #cbd2dc;
            border-radius: 4px;
            background: #fff;
            color: var(--cv-ink);
            font: inherit;
        }

        .profile-field textarea {
            min-height: 76px;
            resize: vertical;
        }

        .profile-dialog-actions {
            justify-content: flex-start;
            margin-top: 20px;
        }

        .profile-action-button {
            padding: 9px 13px;
            border: 0;
            border-radius: 4px;
            background: var(--cv-blue);
            color: #fff;
            font: inherit;
            cursor: pointer;
        }

        .profile-delete-form {
            margin-top: 12px;
        }

        .profile-delete-button {
            padding: 0;
            border: 0;
            background: transparent;
            color: #a32626;
            font: inherit;
            cursor: pointer;
        }

        @media (max-width: 600px) {
            .cv-sheet {
                margin: 0;
                min-height: 100vh;
                box-shadow: none;
            }

            .cv-header {
                min-height: 170px;
                padding: 28px 7%;
            }

            .cv-header p {
                letter-spacing: 3px;
            }

            .cv-avatar {
                width: 88px;
                border-width: 3px;
                font-size: 25px;
            }

            .cv-content {
                padding: 30px 7% 48px;
            }

            .personal-data {
                grid-template-columns: minmax(110px, 140px) 8px 1fr;
                column-gap: 7px;
                font-size: 14px;
            }

            .cv-section h2 {
                min-width: 190px;
            }

            .profile-dialog {
                padding: 18px;
            }

            .profile-form-grid {
                grid-template-columns: 1fr;
            }

            .profile-field-wide {
                grid-column: auto;
            }
        }

        @media print {
            body {
                background: #fff;
            }

            .cv-sheet {
                width: 100%;
                min-height: 0;
                margin: 0;
                box-shadow: none;
            }

            .cv-admin-link {
                display: none;
            }

            .cv-alert,
            .profile-dialog {
                display: none;
            }
        }
    </style>
</head>

<body>
    <main class="cv-sheet">
        <header class="cv-header">
            <div>
                <h1>{{ $profilCv?->nama ?? 'Nama Lengkap' }}</h1>
                <p>{{ $profilCv?->profesi ?? 'Bidang / Jurusan' }}</p>
            </div>
            <div class="cv-avatar" aria-label="Inisial profil">
                @if ($profilCv?->foto)
                    <img src="{{ asset('storage/' . $profilCv->foto) }}" alt="Foto profil {{ $profilCv->nama }}">
                @else
                    {{ $profilCv?->nama ? mb_substr($profilCv->nama, 0, 1) : 'CV' }}
                @endif
            </div>
        </header>

        <div class="cv-content">
            @if (session('success'))
                <div class="cv-alert">{{ session('success') }}</div>
            @endif

            <section class="cv-section">
                <h2>Data Pribadi</h2>
                <div class="personal-data">
                    <span class="label">Nama</span><span>:</span><span>{{ $profilCv?->nama ?? '-' }}</span>
                    <span class="label">Tempat, Tanggal
                        Lahir</span><span>:</span><span>{{ $profilCv?->tempat_tanggal_lahir ?? '-' }}</span>
                    <span class="label">Alamat</span><span>:</span><span>{{ $profilCv?->alamat ?? '-' }}</span>
                    <span class="label">Sosial
                        Media</span><span>:</span><span>{{ $profilCv?->sosial_media ?? '-' }}</span>
                    <span class="label">Email</span><span>:</span><span>{{ $profilCv?->email ?? '-' }}</span>
                </div>
            </section>

            <section class="cv-section">
                <h2>Pendidikan</h2>
                <ul class="cv-list">
                    <li>{{ $profilCv?->pendidikan ?? 'Belum ada data pendidikan.' }}</li>
                </ul>
            </section>

            <section class="cv-section">
                <h2>Keahlian</h2>
                @forelse ($dataKeahlian as $item)
                    <ul class="cv-list">
                        <li>{{ $item->nama_keahlian }}@if ($item->tingkat_keahlian)
                                <span class="experience-meta">({{ $item->tingkat_keahlian }})</span>
                            @endif
                        </li>
                    </ul>
                    @empty
                        <p class="empty-copy">Belum ada keahlian yang ditambahkan.</p>
                    @endforelse
                </section>

                <section class="cv-section">
                    <h2>Pengalaman Kerja</h2>
                    @forelse ($dataPengalamanKerja as $item)
                        <article class="experience-item">
                            <h3>{{ $item->posisi }} di {{ $item->perusahaan }}</h3>
                            <div class="experience-meta">{{ $item->tanggal_mulai }} -
                                {{ $item->tanggal_selesai ?: 'Sekarang' }}</div>
                            @if ($item->deskripsi)
                                <p>{{ $item->deskripsi }}</p>
                            @endif
                        </article>
                    @empty
                        <p class="empty-copy">Belum ada pengalaman kerja yang ditambahkan.</p>
                    @endforelse
                </section>
            </div>
        </main>

        <div class="cv-admin-link">
            <button type="button" onclick="document.getElementById('profile-dialog').showModal()">
                {{ $profilCv ? 'Edit Profil' : 'Tambah Profil' }}
            </button>
            <a href="{{ route('admin.keahlian.index') }}">Kelola CV</a>
        </div>

        <dialog id="profile-dialog" class="profile-dialog">
            <div class="profile-dialog-header">
                <h2>{{ $profilCv ? 'Edit Profil CV' : 'Tambah Profil CV' }}</h2>
                <form method="dialog">
                    <button type="submit" class="profile-dialog-close">Tutup</button>
                </form>
            </div>

            @if ($errors->any())
                <div class="cv-alert cv-alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ $profilCv ? route('cv.profil.update', $profilCv) : route('cv.profil.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if ($profilCv)
                    @method('PUT')
                @endif

                <div class="profile-form-grid">
                    <div class="profile-field">
                        <label for="nama">Nama Lengkap</label>
                        <input id="nama" name="nama" type="text" value="{{ old('nama', $profilCv?->nama) }}"
                            required>
                    </div>
                    <div class="profile-field">
                        <label for="profesi">Bidang / Jurusan</label>
                        <input id="profesi" name="profesi" type="text"
                            value="{{ old('profesi', $profilCv?->profesi) }}" required>
                    </div>
                    <div class="profile-field">
                        <label for="tempat_tanggal_lahir">Tempat, Tanggal Lahir</label>
                        <input id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" type="text"
                            value="{{ old('tempat_tanggal_lahir', $profilCv?->tempat_tanggal_lahir) }}" required>
                    </div>
                    <div class="profile-field">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $profilCv?->email) }}"
                            required>
                    </div>
                    <div class="profile-field profile-field-wide">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" required>{{ old('alamat', $profilCv?->alamat) }}</textarea>
                    </div>
                    <div class="profile-field">
                        <label for="sosial_media">Sosial Media</label>
                        <input id="sosial_media" name="sosial_media" type="text"
                            value="{{ old('sosial_media', $profilCv?->sosial_media) }}">
                    </div>
                    <div class="profile-field profile-field-wide">
                        <label for="pendidikan">Pendidikan</label>
                        <textarea id="pendidikan" name="pendidikan" required>{{ old('pendidikan', $profilCv?->pendidikan) }}</textarea>
                    </div>
                    <div class="profile-field profile-field-wide">
                        <label for="foto">Foto Profil</label>
                        @if ($profilCv?->foto)
                            <img class="profile-current-photo" src="{{ asset('storage/' . $profilCv->foto) }}"
                                alt="Foto profil saat ini">
                        @endif
                        <input id="foto" name="foto" type="file" accept="image/jpeg,image/png,image/webp">
                        <small>JPG, PNG, atau WEBP; maksimal 2 MB. Unggah foto baru untuk mengganti foto saat ini.</small>
                        @if ($profilCv?->foto)
                            <label class="profile-photo-delete">
                                <input name="hapus_foto" type="checkbox" value="1" @checked(old('hapus_foto'))>
                                Hapus foto saat menyimpan
                            </label>
                        @endif
                    </div>
                </div>

                <div class="profile-dialog-actions">
                    <button type="submit" class="profile-action-button">Simpan Profil</button>
                </div>
            </form>

            @if ($profilCv)
                <form action="{{ route('cv.profil.destroy', $profilCv) }}" method="POST" class="profile-delete-form"
                    onsubmit="return confirm('Hapus data profil CV ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="profile-delete-button">Hapus Profil</button>
                </form>
            @endif
        </dialog>

        @if ($errors->any())
            <script>
                document.getElementById('profile-dialog').showModal();
            </script>
        @endif
    </body>

    </html>
