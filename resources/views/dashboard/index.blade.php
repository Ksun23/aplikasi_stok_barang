@extends('layout')

@section('title', 'Dashboard | Barang')

@section('content')
<div class="w-[100%] h-screen px-[2cm]">
    <div class="grid grid-cols-5 grid-rows-1 px-[2.6cm] pt-[1cm]">
        <div class="col-span-1 flex">
            <h1 class="text-4xl font-bold text-center">Dashboard</h1>
        </div>
        <div class="col-span-4 flex justify-between">
            <h1 class="text-4xl font-bold text-center">Data Barang</h1>
            <div>
                <a href="{{ route('dashboard.tambah') }}" class="btn btn-primary">+ Tambah Barang</a>
            </div>
        </div>
    </div>
    <div class="divider"></div>
    <div class="grid grid-cols-5 grid-rows-1">
        <div class="cols-span-1 pl-[1.7cm]">
            <x-menu-component />
        </div>
        <div class="overflow-x-auto w-[100%] col-span-4">
            <table class="table border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barang as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->gambar_barang) }}"
                                alt="{{ $item->nama_barang }}" class="w-20 h-20 object-cover">


                        </td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->kategori->nama_kategori ?? 'Tidak ada kategori' }}</td>
                        <td>{{ $item->harga_barang }}</td>
                        <td>{{ $item->stok_barang }}</td>
                        <td>{{ $item->deskripsi_barang }}</td>
                        <td>
                            <a href="{{ route('dashboard.edit', $item->id) }}" class="btn btn-warning text-white">Edit</a>
                            <form action="{{ route('dashboard.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error text-white ml-2">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="join mt-[1cm] flex justify-center">
                @for ($i = 1; $i <= $barang->lastPage(); $i++)
                    <a href="{{ $barang->url($i) }}" class="join-item btn {{ $i == $barang->currentPage() ? 'btn-active' : '' }}">{{ $i }}</a>
                    @endfor
            </div>
        </div>
    </div>
</div>
@endsection