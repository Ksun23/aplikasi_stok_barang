@extends('layout')

@section('title', 'Dashboard | Kategori')

@section('content')
<div class="w-[100%] h-screen px-[2cm]">
    <div class="grid grid-cols-5 grid-rows-1 px-[2.6cm] pt-[1cm]">
        <div class="col-span-1 flex">
            <h1 class="text-4xl font-bold text-center">Dashboard</h1>
        </div>
        <div class="col-span-4 flex justify-between">
            <h1 class="text-4xl font-bold text-center">Data Kategori</h1>
            <div>
                <a href="{{ route('kategori.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
                <dialog id="my_modal_1" class="modal">
                    <div class="modal-box">
                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <h3 class="font-bold text-lg">Tambah Kategori</h3>
                            <div class="form-control">
                                <label class="label">Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="input input-bordered" required>
                            </div>
                            <div class="modal-action">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn" onclick="my_modal_1.close()">Batal</button>
                            </div>
                        </form>
                    </div>
                </dialog>
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
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->nama_kategori }}</td>
                        <td>
                            <a href="{{ route('kategori.edit', $category->id) }}" class="btn btn-warning text-white">Edit</a>
                            <form action="{{ route('kategori.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error text-white ml-2">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection