<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background:
                linear-gradient(135deg, #eef2f7, #dce7f7, #f8fafc);
            min-height: 100vh;
        }

        /* Box utama */
        .main-card {
            border: none;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.08);
        }

        /* Header */
        .top-header {
            background: linear-gradient(135deg, #0b1f4d, #163b85, #0d6efd);
            color: white;
            padding: 35px;
        }

        .top-header h2 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .top-header p {
            margin-top: 8px;
            opacity: 0.9;
        }

        /* Label */
        label {
            font-weight: 700;
            margin-bottom: 8px;
            color: #1f2937;
        }

        /* Input */
        .form-control {
            border-radius: 14px;
            padding: 12px 15px;
            border: 1px solid #d1d5db;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.18rem rgba(13, 110, 253, 0.15);
        }

        /* Tombol */
        .btn-save {
            background: linear-gradient(135deg, #16a34a, #15803d);
            border: none;
            color: white;
            padding: 12px 22px;
            border-radius: 12px;
            font-weight: 700;
        }

        .btn-save:hover {
            color: white;
            transform: translateY(-1px);
        }

        .btn-back {
            background: #6b7280;
            border: none;
            color: white;
            padding: 12px 22px;
            border-radius: 12px;
            font-weight: 700;
        }

        .btn-back:hover {
            background: #4b5563;
            color: white;
        }

        /* Footer */
        .footer-text {
            color: #6b7280;
            font-size: 14px;
        }
    </style>

</head>

<body>

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card main-card">

                    <!-- Header -->
                    <div class="top-header">
                        <h2>Tambah Buku Baru</h2>
                        <p>Silakan isi data buku dengan lengkap dan benar</p>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4 p-md-5">

                        <form action="/buku/store" method="POST">
                            @csrf

                            <!-- Judul Buku -->
                            <div class="mb-4">
                                <label>Judul Buku</label>

                                <input type="text"
                                    name="judul"
                                    value="{{ old('judul') }}"
                                    class="form-control @error('judul') is-invalid @enderror"
                                    placeholder="Masukkan judul buku">

                                @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pengarang -->
                            <div class="mb-4">
                                <label>Nama Pengarang</label>

                                <input type="text"
                                    name="pengarang"
                                    value="{{ old('pengarang') }}"
                                    class="form-control @error('pengarang') is-invalid @enderror"
                                    placeholder="Masukkan nama pengarang">

                                @error('pengarang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Tahun Terbit -->
                            <div class="mb-4">
                                <label>Tahun Terbit</label>

                                <input type="number"
                                    name="tahun_terbit"
                                    value="{{ old('tahun_terbit') }}"
                                    class="form-control @error('tahun_terbit') is-invalid @enderror"
                                    placeholder="Contoh: 2024">

                                @error('tahun_terbit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Sinopsis -->
                            <div class="mb-4">
                                <label>Sinopsis Buku</label>

                                <textarea
                                    name="sinopsis"
                                    rows="5"
                                    class="form-control @error('sinopsis') is-invalid @enderror"
                                    placeholder="Masukkan ringkasan isi buku">{{ old('sinopsis') }}</textarea>

                                @error('sinopsis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="d-flex gap-3 flex-wrap">

                                <button type="submit" class="btn btn-save">
                                    💾 Simpan Buku
                                </button>

                                <a href="/buku" class="btn btn-back">
                                    ← Kembali
                                </a>

                            </div>

                        </form>

                        <hr class="my-4">

                        <div class="text-center footer-text">
                            UNIVERSITAS METHODIST INDONESIA • Laravel CRUD Project
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>