<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku Profesional</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background:
                linear-gradient(135deg, #eef2f7, #dce7f7, #f5f7fa);
            min-height: 100vh;
        }

        .main-box {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
        }

        .top-header {
            background: linear-gradient(135deg, #0b1f4d, #163b85, #0d6efd);
            color: white;
            padding: 35px;
        }

        .top-header h1 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .top-header p {
            margin: 0;
            opacity: 0.9;
            font-size: 15px;
        }

        .btn-add {
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 12px;
            font-weight: 700;
            box-shadow: 0 8px 18px rgba(22, 163, 74, 0.25);
        }

        .btn-add:hover {
            transform: translateY(-2px);
            color: white;
        }

        .table {
            border-radius: 18px;
            overflow: hidden;
        }

        thead {
            background: #111827;
            color: white;
        }

        thead th {
            padding: 16px !important;
            font-size: 15px;
        }

        tbody td {
            padding: 15px !important;
            vertical-align: middle;
        }

        tbody tr {
            transition: 0.25s;
        }

        tbody tr:hover {
            background: #f8fbff;
            transform: scale(1.003);
        }

        .btn-edit {
            background: #f59e0b;
            color: white;
            border: none;
            padding: 7px 16px;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-edit:hover {
            background: #d97706;
            color: white;
        }

        .btn-delete {
            background: #dc2626;
            color: white;
            border: none;
            padding: 7px 16px;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-delete:hover {
            background: #b91c1c;
            color: white;
        }

        .badge-box {
            background: #eff6ff;
            color: #1d4ed8;
            padding: 10px 16px;
            border-radius: 12px;
            font-weight: 700;
        }

        .footer {
            color: #6b7280;
            font-size: 14px;
            margin-top: 15px;
        }

        @media(max-width:768px) {
            .top-header {
                text-align: center;
            }

            .top-header .row {
                gap: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <div class="main-box">

            <!-- Header -->
            <div class="top-header">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1>Katalog Buku</h1>
                        <p>Sistem Informasi Data Buku • Laravel 12 Project</p>
                    </div>

                    <div class="col-md-4 text-md-end mt-3 mt-md-0">

                        <a href="/buku/create" class="btn btn-add me-2">
                            + Tambah Buku
                        </a>

                        <form action="{{ route('logout') }}"
                            method="POST"
                            class="d-inline">
                            @csrf

                            <button type="submit" class="btn btn-danger">
                                Logout
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Isi -->
            <div class="p-4">

                {{-- FLASH MESSAGE TUGAS 7 --}}
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
                    <strong>Berhasil!</strong>
                    {{ session('success') }}

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                    </button>
                </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                    <div class="badge-box">
                        Total Buku: {{ count($data) }}
                    </div>

                    <div class="text-muted">
                        UNIVERSITAS METHODIST INDONESIA
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">

                        <thead class="text-center">
                            <tr>
                                <th width="60">No</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th width="100">Tahun</th>
                                <th>Sinopsis</th>
                                <th width="190">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($data as $item)
                            <tr>

                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <strong>{{ $item->judul }}</strong>
                                </td>

                                <td>{{ $item->pengarang }}</td>

                                <td class="text-center">
                                    {{ $item->tahun_terbit }}
                                </td>

                                <td>{{ $item->sinopsis }}</td>

                                <td>
                                    <div class="d-flex gap-2 justify-content-center">

                                        <a href="/buku/{{ $item->id }}/edit"
                                            class="btn btn-sm btn-edit">
                                            Edit
                                        </a>

                                        <form action="/buku/{{ $item->id }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-sm btn-delete">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="6" class="text-center text-muted py-5">
                                    Belum ada data buku tersedia.
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>
                </div>

                <div class="footer text-center">
                  
                </div>

            </div>
        </div>

    </div>

    <!-- Bootstrap JS untuk Flash Message -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>