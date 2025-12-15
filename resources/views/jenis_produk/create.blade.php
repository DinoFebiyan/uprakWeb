@extends('layouts.main')

@section('content')
<div class="bg-white shadow rounded p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Jenis Produk</h1>

    <form action="{{ route('jenis_produk.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama_jenis" class="block">Nama Jenis</label>
            <input type="text" name="nama_jenis" id="nama_jenis" class="border px-3 py-2 w-full" required>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
