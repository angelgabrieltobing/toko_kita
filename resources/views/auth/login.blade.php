<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aplikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card {
            width: 100%;
            max-width: 450px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 45px rgba(0,0,0,0.2);
        }
        .card-header-custom {
            background: linear-gradient(135deg, #0b1f4d, #163b85);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .card-header-custom h2 {
            margin: 0;
            font-weight: 800;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
        }
        .btn-login {
            background: linear-gradient(135deg, #16a34a, #15803d);
            border: none;
            color: white;
            padding: 12px;
            font-weight: 700;
            border-radius: 10px;
            width: 100%;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #15803d, #166534);
            color: white;
        }
        .akun-list {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
        }
        .akun-item {
            font-size: 12px;
            padding: 8px;
            border-bottom: 1px solid #e9ecef;
        }
        .akun-item:last-child {
            border-bottom: none;
        }
        .badge-produk {
            background: #0d6efd;
            color: white;
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 10px;
            display: inline-block;
            margin-right: 8px;
        }
        .badge-buku {
            background: #198754;
            color: white;
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 10px;
            display: inline-block;
            margin-right: 8px;
        }
        .label-produk {
            font-weight: bold;
            color: #0d6efd;
        }
        .label-buku {
            font-weight: bold;
            color: #198754;
        }
    </style>
</head>
<body>
    <div class="card login-card">
        <div class="card-header-custom">
            <h2>Login Aplikasi</h2>
            <p class="mb-0">Sistem Perpustakaan & Toko Produk</p>
        </div>
        <div class="card-body p-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="/login">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Masukkan email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>

            <!-- Daftar Semua Akun -->
            <div class="akun-list">
                <strong class="mb-2 d-block">Daftar Akun Tersedia:</strong>
                
                <div class="akun-item">
                    <span class="badge-produk">Produk</span>
                    <span class="label-produk">Admin Toko</span>
                    <br>
                    <small>Email: admin@produk.com | Password: 123</small>
                </div>

                <div class="akun-item">
                    <span class="badge-produk">Produk</span>
                    <span class="label-produk">Customer</span>
                    <br>
                    <small>Email: customer@produk.com | Password: 123</small>
                </div>

                <div class="akun-item">
                    <span class="badge-buku">Perpustakaan</span>
                    <span class="label-buku">Pustakawan</span>
                    <br>
                    <small>Email: pustakawan@kampus.ac.id | Password: 123</small>
                </div>

                <div class="akun-item">
                    <span class="badge-buku">Perpustakaan</span>
                    <span class="label-buku">Anggota</span>
                    <br>
                    <small>Email: anggota@perpustakaan.com | Password: 123</small>
                </div>
            </div>

            <div class="text-center mt-3 small text-muted">
                <p class="mb-0">Keterangan: Setelah login akan otomatis masuk ke halaman yang sesuai dengan role</p>
            </div>
        </div>
    </div>
</body>
</html>