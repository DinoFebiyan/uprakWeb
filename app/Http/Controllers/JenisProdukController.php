<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use Illuminate\Http\Request;

class JenisProdukController extends Controller
{
    /**
     * Tampilkan semua jenis produk.
     */
    public function index()
    {
        $jenisProduk = JenisProduk::all();
        return view('jenis_produk.index', compact('jenisProduk'));
    }

    /**
     * Form tambah jenis produk.
     */
    public function create()
    {
        return view('jenis_produk.create');
    }

    /**
     * Simpan jenis produk baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|unique:jenis_produk,nama_jenis',
        ]);

        JenisProduk::create($request->all());

        return redirect()->route('jenis_produk.index')
                         ->with('success', 'Jenis produk berhasil ditambahkan.');
    }

    /**
     * Form edit jenis produk.
     */
    public function edit(JenisProduk $jenisProduk)
    {
        return view('jenis_produk.edit', compact('jenisProduk'));
    }

    /**
     * Update jenis produk.
     */
    public function update(Request $request, JenisProduk $jenisProduk)
    {
        $request->validate([
            'nama_jenis' => 'required|unique:jenis_produk,nama_jenis,' . $jenisProduk->id,
        ]);

        $jenisProduk->update($request->all());

        return redirect()->route('jenis_produk.index')
                         ->with('success', 'Jenis produk berhasil diperbarui.');
    }

    /**
     * Hapus jenis produk.
     */
    public function destroy(JenisProduk $jenisProduk)
    {
        $jenisProduk->delete();

        return redirect()->route('jenis_produk.index')
                         ->with('success', 'Jenis produk berhasil dihapus.');
    }
}
