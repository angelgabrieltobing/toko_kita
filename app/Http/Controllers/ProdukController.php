<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $data_produk = Produk::all();

        return view('produk.index', compact('data_produk'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        // VALIDASI
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|min:3|max:255',
            'harga' => 'required|numeric|min:1000',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0'
        ], [

            'nama_produk.required' => 'Nama produk wajib diisi!',
            'nama_produk.min' => 'Nama produk minimal 3 karakter!',

            'harga.required' => 'Harga wajib diisi!',
            'harga.numeric' => 'Harga harus berupa angka!',
            'harga.min' => 'Harga minimal Rp 1.000!',

            'stok.required' => 'Stok wajib diisi!',
            'stok.integer' => 'Stok harus berupa angka bulat!',
            'stok.min' => 'Stok tidak boleh kurang dari 0!'
        ]);

        // SIMPAN DATA
        Produk::create($validatedData);

        return redirect('/produk')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // FORM EDIT
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);

        return view('produk.edit', compact('produk'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        // VALIDASI
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|min:3|max:255',
            'harga' => 'required|numeric|min:1000',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0'
        ], [

            'nama_produk.required' => 'Nama produk wajib diisi!',
            'nama_produk.min' => 'Nama produk minimal 3 karakter!',

            'harga.required' => 'Harga wajib diisi!',
            'harga.numeric' => 'Harga harus berupa angka!',
            'harga.min' => 'Harga minimal Rp 1.000!',

            'stok.required' => 'Stok wajib diisi!',
            'stok.integer' => 'Stok harus berupa angka bulat!',
            'stok.min' => 'Stok tidak boleh kurang dari 0!'
        ]);

        // CARI DATA
        $produk = Produk::findOrFail($id);

        // UPDATE
        $produk->update($validatedData);

        return redirect('/produk')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        $produk->delete();

        return redirect('/produk')
            ->with('success', 'Produk berhasil dihapus!');
    }
}