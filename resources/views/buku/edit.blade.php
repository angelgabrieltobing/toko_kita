<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background:
                linear-gradient(135deg, #eef2f7, #dce7f7, #f8fafc);
            min-height: 100vh;
        }

        /* Card utama */
        .main-card {
            border: none;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
        }

        /* Header */
        .top-header {
            background: linear-gradient(135deg, #7c3aed, #4f46e5, #2563eb);
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
            opacity: 0.92;
        }

        /* Label */
        label {
            font-weight: 700;
            margin-bottom: 8px;
            color: #111827;
        }

        /* Input */
        .form-control {
            border-radius: 14px;
            padding: 12px 15px;
            border: 1px solid #d1d5db;
        }

        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 0.18rem rgba(79, 70, 229, 0.15);
        }

        /* Tombol */
        .btn-update {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 700;
        }

        .btn-update:hover {
            color: white;
            transform: translateY(-1px);
        }

        .btn-back {
            background: #6b7280;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 700;
        }

        .btn-back:hover {
            background: #4b5563;
            color: white;
        }

        /* Footer */
        .footer {
            color: #6b7280;
            font-size: 14px;
        }

        .badge-edit {
            background: #eef2ff;
            color: #4338ca;
            padding: 8px 14px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
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
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <div>
                                <h2>Edit Data Buku</h2>
                                <p>Perbarui informasi buku dengan data terbaru</p>
                            </div>

                            <div class="badge-edit">
                                ID Buku: {{ $buku->id }}
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4 p-md-5">

                        <form action="/buku/{{ $buku->id }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label>Judul Buku</label>

                                <input type="text"
                                    name="judul"
                                    value="{{ old('judul', $buku->judul) }}"
                                    class="form-control @error('judul') is-invalid @enderror">

                                @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label>Nama Pengarang</label>

                                <input type="text"
                                    name="pengarang"
                                    value="{{ old('pengarang', $buku->pengarang) }}"
                                    class="form-control @error('pengarang') is-invalid @enderror">

                                @error('pengarang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label>Tahun Terbit</label>

                                <input type="number"
                                    name="tahun_terbit"
                                    value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"
                                    class="form-control @error('tahun_terbit') is-invalid @enderror">

                                @error('tahun_terbit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label>Sinopsis Buku</label>

                                <textarea name="sinopsis"
                                    rows="5"
                                    class="form-control @error('sinopsis') is-invalid @enderror">{{ old('sinopsis', $buku->sinopsis) }}</textarea>

                                @error('sinopsis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="d-flex gap-3 flex-wrap">

                                <button type="submit" class="btn btn-update">
                                    💾 Update Buku
                                </button>

                                <a href="/buku" class="btn btn-back">
                                    ← Kembali
                                </a>

                            </div>

                        </form>

                        <hr class="my-4">

                        <div class="text-center footer">
                            UNIVERSITAS METHODIST INDONESIA • Laravel CRUD Project
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>