<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

// ======================
// RUTE STATIS & CONTOH
// ======================

Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role == 'admin' || $user->role == 'customer') {
            return redirect('/produk');
        } elseif ($user->role == 'pustakawan' || $user->role == 'anggota') {
            return redirect('/buku');
        }
    }
    return view('welcome');
});

Route::get('/buku-', function () {
    return 'Selamat datang di Katalog Buku Utama';
});

Route::get('/halo', function () {
    return 'Halo, Selamat Datang di Laravel 12!';
});

Route::get('/mahasiswa/{id}', function ($id) {
    return 'anda sedang melihat data mahasiswa dengan ID ' . $id;
});

Route::get('/prod/{kategori}/{merk}', function ($kategori, $merk) {
    return "Kategori Produk: " . $kategori . " <br> Merk: " . $merk;
});

Route::get('/salam/{nama?}', function ($nama = 'Pengunjung') {
    return "Halo " . $nama . "!";
});

// ======================
// RUTE MAHASISWA
// ======================

Route::get('/mhsiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'show']);
Route::get('/data-mahasiswa', [MahasiswaController::class, 'data']);

// ======================
// RUTE TENTANG (Hanya 1)
// ======================

Route::get('/tentang', [TentangController::class, 'index']);

// ======================
// RUTE PRODUK (SEMUA BISA LIHAT)
// ======================

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

// ======================
// RUTE PRODUK (KHUSUS ADMIN)
// ======================

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});

// ======================
// RUTE BUKU (SEMUA BISA LIHAT)
// ======================

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/detail/{id}', [BukuController::class, 'detail'])->name('buku.detail');
Route::get('/buku/kategori/{genre}', [BukuController::class, 'kategori'])->name('buku.kategori');

// ======================
// RUTE BUKU (KHUSUS PUSTAKAWAN)
// ======================

Route::middleware(['auth', 'role:pustakawan'])->group(function () {
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
});

// ======================
// RUTE AUTENTIKASI (LOGIN/LOGOUT)
// ======================

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
