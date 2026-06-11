<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $data = Buku::all();
        return view('buku.index', compact('data'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:5',
            'pengarang' => 'required|regex:/^[A-Za-z\s]+$/',
            'tahun_terbit' => 'required|integer|min:1900|max:2026',
        ]);

        Buku::create($request->all());

        return redirect('/buku')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|min:5',
            'pengarang' => [
                'required',
                'regex:/^[A-Za-z\s]+$/'
            ],
            'tahun_terbit' => 'required|numeric|min:1900|max:2026',
            'sinopsis' => 'required'
        ]);

        $buku = Buku::findOrFail($id);

        $buku->update($request->all());

        return redirect('/buku')
            ->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return redirect('/buku')
            ->with('success', 'Buku berhasil dihapus!');
    }

    // dari modul lama
    public function detail($id)
    {
        return "Anda sedang melihat detail buku dengan ID: " . $id;
    }

    public function kategori($genre)
    {
        return "Menampilkan daftar buku dengan kategori: " . $genre;
    }
}
