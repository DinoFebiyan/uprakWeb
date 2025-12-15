@extends('layouts.main')

@section('content')
<div class="bg-white shadow rounded p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>

    <a href="{{ route('produk.create') }}" class="bg-blue-500 text-white px-3 py-2 rounded mb-4 inline-block">
        Tambah Produk
    </a>

    <table class="table-auto w-full border-collapse border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Nama Produk</th>
                <th class="border px-4 py-2">Deskripsi</th>
                <th class="border px-4 py-2">Harga</th>
                <th class="border px-4 py-2">Jenis Produk</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $item)
            <tr>
                <td class="border px-4 py-2">{{ $item->nama_produk }}</td>
                <td class="border px-4 py-2">{{ $item->deskripsi }}</td>
                <td class="border px-4 py-2">{{ $item->harga }}</td>
                <td class="border px-4 py-2">{{ $item->jenisProduk->nama_jenis }}</td>
                <td class="border px-4 py-2">
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('produk.edit', $item->id) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 ml-2">Hapus</button>
                        </form>
                    @elseif(auth()->user()->role === 'staff')
                        <a href="{{ route('produk.edit', $item->id) }}" class="text-blue-600">Edit Harga</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
