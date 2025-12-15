@extends('layouts.main')

@section('content')
<div class="bg-white shadow rounded p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Jenis Produk</h1>

    @if(auth()->user()->role === 'admin')
        <a href="{{ route('jenis_produk.create') }}" class="bg-blue-500 text-white px-3 py-2 rounded mb-4 inline-block">
            Tambah Jenis Produk
        </a>
    @endif

    <table class="table-auto w-full border-collapse border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nama Jenis</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jenisProduk as $jenis)
            <tr>
                <td class="border px-4 py-2">{{ $jenis->id }}</td>
                <td class="border px-4 py-2">{{ $jenis->nama_jenis }}</td>
                <td class="border px-4 py-2">
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('jenis_produk.edit', $jenis->id) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('jenis_produk.destroy', $jenis->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 ml-2">Hapus</button>
                        </form>
                    @else
                        <span class="text-gray-500">Hanya bisa melihat</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
