@extends('layouts.main')

@section('content')
<div class="bg-white shadow rounded p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Produk</h1>

    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama_produk" class="block">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" value="{{ $produk->nama_produk }}"
                class="border px-3 py-2 w-full"
                @if(auth()->user()->role === 'staff') readonly @endif>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="border px-3 py-2 w-full"
                    @if(auth()->user()->role === 'staff') readonly @endif>{{ $produk->deskripsi }}</textarea>
        </div>

        <div class="mb-4">
            <label for="harga" class="block">Harga</label>
            <input type="number" name="harga" id="harga" value="{{ $produk->harga }}" class="border px-3 py-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="jenis_produk_id" class="block">Jenis Produk</label>
            <select name="jenis_produk_id" id="jenis_produk_id" class="border px-3 py-2 w-full"
                    @if(auth()->user()->role === 'staff') disabled @endif>
                @foreach($jenisProduk as $jenis)
                    <option value="{{ $jenis->id }}" @if($produk->jenis_produk_id == $jenis->id) selected @endif>
                        {{ $jenis->nama_jenis }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
