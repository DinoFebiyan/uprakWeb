<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\JenisProduk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        // Ambil produk beserta relasi jenisProduk
        $produk = Produk::with('jenisProduk')->get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        // Ambil semua jenis produk untuk dropdown
        $jenisProduk = JenisProduk::all();
        return view('produk.create', compact('jenisProduk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'jenis_produk_id' => 'required|exists:jenis_produk,id',
        ]);

        Produk::create($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        $jenisProduk = JenisProduk::all();
        return view('produk.edit', compact('produk', 'jenisProduk'));
    }

    public function update(Request $request, Produk $produk)
    {
        if (auth()->user()->role === 'staff') {
            // Staff hanya boleh update harga
            $request->validate([
                'harga' => 'required|numeric',
            ]);
            $produk->update([
                'harga' => $request->harga,
            ]);
        } else {
            // Admin full update
            $request->validate([
                'nama_produk' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required|numeric',
                'jenis_produk_id' => 'required|exists:jenis_produk,id',
            ]);
            $produk->update($request->all());
        }

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }


    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
