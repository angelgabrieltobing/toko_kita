@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <!-- Header Halaman dan Tombol Tambah -->
    <div class="d-flex justify-content-between align-items-center mb-4 mt-2">
        <h1 class="h3 mb-0">Daftar Produk Tersedia</h1>
        <a href="/produk/create" class="btn btn-primary">Tambah Produk Baru</a>
    </div>

    <!-- Grid Produk -->
    <div class="row">
        <!-- Looping data produk menggunakan Card Bootstrap -->
        @foreach($data_produk as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">

                        <!-- Informasi Produk -->
                        <h5 class="card-title fw-bold">{{ $item->nama_produk }}</h5>

                        <h6 class="card-subtitle mb-3 text-primary">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </h6>

                        <p class="card-text text-muted">
                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 50) }}
                        </p>

                        <!-- Kondisi Stok -->
                        @if($item->stok > 0)
                            <p class="card-text text-success mb-2 fw-semibold">
                                Stok: {{ $item->stok }} Tersedia
                            </p>
                            <a href="#" class = "btn btn-primary w-100">Beli Sekarang</a>
                        @else
                            <p class="card-text text-danger mb-2 fw-semibold">
                                Stok Habis
                            </p>
                        @endif

                        <!-- Tombol Aksi Edit dan Hapus -->
                        <div class="mt-4 pt-3 border-top d-flex justify-content-between align-items-center">

                            <!-- Tombol Edit -->
                            <a href="/produk/{{ $item->id }}/edit"
                               class="btn btn-sm btn-outline-warning w-50 me-2">
                                Edit
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="/produk/{{ $item->id }}"
                                  method="POST"
                                  class="w-50"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-outline-danger w-100">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection