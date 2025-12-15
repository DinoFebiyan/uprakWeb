@extends('layouts.main')

@section('content')
<div class="bg-white shadow rounded p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama_produk" class="block">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="border px-3 py-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="border px-3 py-2 w-full" required></textarea>
        </div>

        <div class="mb-4">
            <label for="harga" class="block">Harga</label>
            <input type="number" name="harga" id="harga" class="border px-3 py-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="jenis_produk_id" class="block">Jenis Produk</label>
            <select name="jenis_produk_id" id="jenis_produk_id" class="border px-3 py-2 w-full" required>
                <option value="">-- Pilih Jenis Produk --</option>
                @foreach($jenisProduk as $jenis)
                    <option value="{{ $jenis->id }}">{{ $jenis->nama_jenis }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
